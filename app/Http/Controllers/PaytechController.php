<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\SubscriptionPlan;
use App\Models\Subscriptions;
use App\Services\PayTech;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class PaytechController extends Controller
{


    protected $payTechService;

    // public function __construct(PayTechService $payTechService)
    // {
    //     $this->payTechService = $payTechService;
    // }

    public function showForm()
    {
        return view('payment.form');
    }

  /**
     * Initier un paiement avec PayTech.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function initiatePayment(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|numeric',
            'currency' => 'required|string|size:3',
            'subscription_plan_id' => 'required|integer|exists:subscription_plans,id',
        ]);

        // Générer un identifiant unique pour la transaction
        $transaction_id = uniqid();
        $transaction_id_full = "xeeweule-" . $transaction_id;

        // Récupérer les clés API PayTech depuis le fichier .env
        $apiKey = env('PAYTECH_API_KEY');
        $apiSecret = env('PAYTECH_API_SECRET');

        // Instancier l'objet PayTech avec les clés API
        $payTech = new PayTech($apiKey, $apiSecret);

        try {
            // Configurer les paramètres de la requête de paiement
            $payTech->setQuery([
                'item_name' => $validatedData['item_name'],
                'item_price' => $validatedData['item_price'],
                'command_name' => "Paiement {$validatedData['item_name']} via PayTech",
            ])
            ->setCustomeField([
                'item_id' => $validatedData['subscription_plan_id'],
                'time_command' => time(),
                'ip_user' => $request->ip(),
                'lang' => $request->header('Accept-Language'),
            ])
            ->setTestMode(true) // Activer le mode test si nécessaire
            ->setCurrency($validatedData['currency'])
            ->setRefCommand($transaction_id_full)
            ->setNotificationUrl([
                'ipn_url' => 'https://f785-41-214-3-212.ngrok-free.app/paytech/ipn', // URL HTTPS pour les notifications IPN de PayTech
                'success_url' => 'https://f785-41-214-3-212.ngrok-free.app/paytech/success/' . $validatedData['subscription_plan_id'],
                'cancel_url' => 'https://f785-41-214-3-212.ngrok-free.app/paytech/cancel', // URL de redirection en cas d'annulation
            ]);

            // Envoyer la requête de paiement
            $response = $payTech->send();

            // Vérifier si la réponse contient une URL de redirection
            if (is_array($response) && isset($response['redirect_url'])) {
                $payment_link = $response['redirect_url'];

                // Enregistrer les détails de la transaction dans un fichier JSON
                Storage::put("payments/{$transaction_id_full}.json", json_encode([
                    'item_name' => $validatedData['item_name'],
                    'item_price' => $validatedData['item_price'],
                    'currency' => $validatedData['currency'],
                    'status' => 'pending', // Statut initial
                    'date' => now(),
                    'ref_command' => $transaction_id_full,
                    'user_ip' => $request->ip(),
                    'user_lang' => $request->header('Accept-Language'),
                    'payment_link' => $payment_link,
                    'custom_field' => [
                        'item_id' => $validatedData['subscription_plan_id'],
                        'time_command' => time(),
                        'ip_user' => $request->ip(),
                        'lang' => $request->header('Accept-Language'),
                    ]
                ]));
   // Activer l'abonnement pour l'utilisateur
   $user = $request->user();
   $subscriptionPlan = SubscriptionPlan::findOrFail($validatedData['subscription_plan_id']);

   $currentSubscription = $user->subscriptions()
                               ->where('subscription_plan_id', $subscriptionPlan->id)
                               ->where('end_date', '>=', now())
                               ->first();

   if ($currentSubscription) {
       return redirect()->back()->with('error', 'Vous êtes déjà abonné à ce plan.');
   }

   $startDate = now();
   $endDate = $startDate->copy()->addDays($subscriptionPlan->duration_days ?? 30);

   $subscription = new Subscriptions([
       'user_id' => $user->id,
       'subscription_plan_id' => $subscriptionPlan->id,
       'start_date' => $startDate,
       'end_date' => $endDate,
       'status' => 'active',
   ]);

   $subscription->save();
                // Rediriger l'utilisateur vers l'URL de paiement de PayTech
                return redirect()->away($payment_link);
            } else {
                // Si la réponse ne contient pas d'URL de redirection, afficher pour le débogage
                return response()->json($response);
            }
        } catch (\Exception $e) {
            // Gérer les exceptions si nécessaire
            Log::error('Error initiating payment', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Une erreur est survenue lors de l\'initiation du paiement.'], 500);
        }
    }

public function handleIpn(Request $request)
{
    $validatedData = $request->validate([
        'api_key_sha256' => 'required|string',
        'api_secret_sha256' => 'required|string',
        'item_name' => 'required|string|max:255',
        'item_price' => 'required|numeric',
        'currency' => 'required|string|size:3',
        'ref_command' => 'required|string',
        'payment_method' => 'required|string',
        'client_phone' => 'required|string|max:15',
        'command_name' => 'required|string|max:255',
        'type_event' => 'required|string',
        'env' => 'required|string',
        'custom_field' => 'nullable|array',
    ]);

    $apiKeySha256 = $validatedData['api_key_sha256'];
    $apiSecretSha256 = $validatedData['api_secret_sha256'];

    $myApiKey = env('PAYTECH_API_KEY');
    $myApiSecret = env('PAYTECH_API_SECRET');

    if (hash('sha256', $myApiSecret) === $apiSecretSha256 && hash('sha256', $myApiKey) === $apiKeySha256) {
        try {
            Payment::create([
                'item_name' => $validatedData['item_name'],
                'item_price' => $validatedData['item_price'],
                'currency' => $validatedData['currency'],
                'status' => 'paid',
                'ref_command' => $validatedData['ref_command'],
                'user_ip' => $request->ip(),
                'user_lang' => $request->header('Accept-Language'),
                'payment_id' => $validatedData['ref_command'],
                'payment_method' => $validatedData['payment_method'],
                'client_phone' => $validatedData['client_phone'],
                'command_name' => $validatedData['command_name'],
                'type_event' => $validatedData['type_event'],
                'env' => $validatedData['env'],
                'custom_field' => json_encode($validatedData['custom_field']),
            ]);

            return response()->json(['message' => 'IPN reçu et traité'], 200);
        } catch (\Exception $e) {
            \Log::error('Échec du traitement de l\'IPN: ' . $e->getMessage());
            return response()->json(['error' => 'Échec du traitement de l\'IPN: ' . $e->getMessage()], 500);
        }
    } else {
        return response()->json(['error' => 'Requête IPN invalide'], 400);
    }
}
public function handleSuccess(Request $request)
{
    Log::info('PayTech payment success callback', $request->all());

    if (!$this->isValidPayTechRequest($request)) {
        return response()->json(['error' => 'Requête non autorisée'], 403);
    }

    DB::beginTransaction();

    try {
        // Validate request data
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|numeric',
            'currency' => 'required|string|size:3',
            'ref_command' => 'required|string',
            'subscription_plan_id' => 'required|integer|exists:subscription_plans,id',
        ]);

        // Enregistrer les détails de la transaction dans la base de données
        $payment = Payment::create([
            'item_name' => $validatedData['item_name'],
            'item_price' => $validatedData['item_price'],
            'currency' => $validatedData['currency'],
            'status' => 'success',
            'ref_command' => $validatedData['ref_command'],
            'user_ip' => $request->ip(),
            'user_lang' => $request->header('Accept-Language'),
            'payment_id' => uniqid(),
            'payment_date' => now(),
        ]);
         $payment->save();


        // Activer l'abonnement pour l'utilisateur
        $user = $request->user();
        $subscriptionPlan = SubscriptionPlan::findOrFail($validatedData['subscription_plan_id']);

        $currentSubscription = $user->subscriptions()
                                    ->where('subscription_plan_id', $subscriptionPlan->id)
                                    ->where('end_date', '>=', now())
                                    ->first();

        if ($currentSubscription) {
            return redirect()->back()->with('error', 'Vous êtes déjà abonné à ce plan.');
        }

        $startDate = now();
        $endDate = $startDate->copy()->addDays($subscriptionPlan->duration_days ?? 30);

        $subscription = new Subscriptions([
            'user_id' => $user->id,
            'subscription_plan_id' => $subscriptionPlan->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 'active',
        ]);

        $subscription->save();

        DB::commit();

        return redirect()->route('subscription.confirmation')->with('success', 'Abonnement souscrit avec succès.');

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error processing payment success callback', ['error' => $e->getMessage()]);
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

protected function isValidPayTechRequest($request)
{
    $signature = $request->header('X-PayTech-Signature');
    return hash_equals($signature, hash_hmac('sha256', $request->getContent(), env('PAYTECH_API_SECRET')));
}



// public function handleIpn(Request $request)
// {
//     // Vérification des paramètres de l'IPN
//     $apiKeySha256 = $request->input('api_key_sha256');
//     $apiSecretSha256 = $request->input('api_secret_sha256');

//     $myApiKey = env('PAYTECH_API_KEY');
//     $myApiSecret = env('PAYTECH_API_SECRET');

//     // Vérification des clés API
//     if (hash('sha256', $myApiSecret) === $apiSecretSha256 && hash('sha256', $myApiKey) === $apiKeySha256) {
//         try {
//             // Enregistrer les informations de paiement dans la base de données
//             $payment = Payment::create([
//                 'item_name' => $request->input('item_name'),
//                 'item_price' => $request->input('item_price'),
//                 'currency' => $request->input('currency'),
//                 'status' => 'paid', // Définissez le statut en fonction de l'événement reçu
//                 'ref_command' => $request->input('ref_command'),
//                 'user_ip' => $request->ip(),
//                 'user_lang' => $request->header('Accept-Language'),
//                 'payment_id' => $request->input('ref_command'), // Utilisation de la même valeur que ref_command pour payment_id
//                 'payment_method' => $request->input('payment_method'),
//                 'client_phone' => $request->input('client_phone'),
//                 'command_name' => $request->input('command_name'),
//                 'type_event' => $request->input('type_event'),
//                 'env' => $request->input('env'),
//                 'custom_field' => json_encode($request->input('custom_field')), // Assurez-vous de traiter les données personnalisées comme requis
//             ]);

//             $payment->save();
//             // Logique supplémentaire si nécessaire

//             return response()->json(['message' => 'IPN received and processed'], 200);
//         } catch (\Exception $e) {
//             // Gestion des erreurs de base de données ou autres erreurs
//             return response()->json(['error' => 'Failed to process IPN: ' . $e->getMessage()], 500);
//         }
//     } else {
//         // Clés API invalides
//         return response()->json(['error' => 'Invalid IPN request'], 400);
//     }
// }


    // public function handleSuccess(Request $request)
    // {
    //     // Utilisation des accesseurs magiques pour accéder aux données de la requête
    //     $itemName = $request->item_name;
    //     $itemPrice = $request->item_price;
    //     $currency = $request->currency;
    //     $refCommand = $request->ref_command;
    //     $userIp = $request->ip();
    //     $userLang = $request->header('Accept-Language');

    //     try {
    //         // Vérifier que toutes les données requises sont présentes
    //         if (!$itemName || !$itemPrice || !$currency || !$refCommand || !$userIp || !$userLang) {
    //             throw new \Exception("Certaines données requises sont manquantes.");
    //         }

    //         // Enregistrer les détails de la transaction dans la base de données
    //         Payment::create([
    //             'item_name' => $itemName,
    //             'item_price' => $itemPrice,
    //             'currency' => $currency,
    //             'status' => 'success', // Ou tout autre statut approprié
    //             'ref_command' => $refCommand,
    //             'user_ip' => $userIp,
    //             'user_lang' => $userLang,
    //             'payment_id' => uniqid(), // Générer un ID de paiement unique si nécessaire
    //             'payment_date' => now(), // Utilisation de Carbon pour la date actuelle
    //         ]);

    //         // Redirection vers une page de succès ou affichage d'un message de succès
    //         return view('paytech.success', ['paymentId' => $refCommand]);
    //     } catch (\Exception $e) {
    //         // Gérer les exceptions si nécessaire
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }



    public function handleCancel()
    {
        return view('paytech.cancel');
    }
}
