<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Services\PayTech;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
        // Récupérer les données nécessaires du formulaire ou de la requête
        $itemName = $request->input('item_name');
        $itemPrice = $request->input('item_price');
        $currency = $request->input('currency');
        $id = $request->input('id'); // Exemple de l'identifiant de l'item ou de la commande

        // Récupérer les clés API PayTech depuis le fichier .env
        $apiKey = env('PAYTECH_API_KEY');
        $apiSecret = env('PAYTECH_API_SECRET');

        // Instancier l'objet PayTech avec les clés API
        $payTech = new PayTech($apiKey, $apiSecret);

        try {
            // Configurer les paramètres de la requête de paiement
            $response = $payTech->setQuery([
                'item_name' => $itemName,
                'item_price' => $itemPrice,
                'command_name' => "Paiement $itemName via PayTech",
            ])
            ->setCustomeField([
                'item_id' => $id,
                'time_command' => time(),
                'ip_user' => $request->ip(),
                'lang' => $request->header('Accept-Language'),
            ])
            ->setTestMode(true) // Activer le mode test si nécessaire
            ->setCurrency($currency)
            ->setRefCommand(uniqid())
            ->setNotificationUrl([
                'ipn_url' => 'https://4141-41-83-23-6.ngrok-free.app/paytech/ipn', // URL HTTPS pour les notifications IPN de PayTech
                'success_url' => 'https://4141-41-83-23-6.ngrok-free.app/paytech/success/' . $id,
                'cancel_url' => 'https://4141-41-83-23-6.ngrok-free.app/paytech/cancel', // URL de redirection en cas d'annulation
            ])
            ->send();

            // Vérifier si la réponse contient une URL de redirection
            if (is_array($response) && isset($response['redirect_url'])) {
                // Rediriger l'utilisateur vers l'URL de paiement de PayTech
                return redirect()->away($response['redirect_url']);
            } else {
                // Si la réponse ne contient pas d'URL de redirection, afficher pour le débogage
                return response()->json($response);
            }
        } catch (\Exception $e) {
            // Gérer les exceptions si nécessaire
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // public function handleIpn(Request $request)
    // {
    //     // Vérifiez les paramètres de l'IPN
    //     $apiKeySha256 = $request->input('api_key_sha256');
    //     $apiSecretSha256 = $request->input('api_secret_sha256');

    //     $myApiKey = env('PAYTECH_API_KEY');
    //     $myApiSecret = env('PAYTECH_API_SECRET');

    //     if (hash('sha256', $myApiSecret) === $apiSecretSha256 && hash('sha256', $myApiKey) === $apiKeySha256) {
    //         // Traitement de la notification IPN
    //         // Enregistrer les informations de paiement dans la base de données
    //         Payment::create([
    //             'item_name' => $request->input('item_name'),
    //             'item_price' => $request->input('item_price'),
    //             'currency' => $request->input('devise'),
    //             'status' => 'paid',
    //             'ref_command' => $request->input('ref_command'),
    //             'user_ip' => $request->ip(),
    //             'user_lang' => $request->header('Accept-Language'),
    //             'payment_id' => $request->input('ref_command')
    //         ]);

    //         return response()->json(['message' => 'IPN received and processed'], 200);
    //     } else {
    //         return response()->json(['error' => 'Invalid IPN request'], 400);
    //     }
    // }

public function handleIpn(Request $request)
{
    // Vérification des paramètres de l'IPN
    $apiKeySha256 = $request->input('api_key_sha256');
    $apiSecretSha256 = $request->input('api_secret_sha256');

    $myApiKey = env('PAYTECH_API_KEY');
    $myApiSecret = env('PAYTECH_API_SECRET');

    // Vérification des clés API
    if (hash('sha256', $myApiSecret) === $apiSecretSha256 && hash('sha256', $myApiKey) === $apiKeySha256) {
        try {
            // Enregistrer les informations de paiement dans la base de données
            $payment = Payment::create([
                'item_name' => $request->input('item_name'),
                'item_price' => $request->input('item_price'),
                'currency' => $request->input('currency'),
                'status' => 'paid', // Définissez le statut en fonction de l'événement reçu
                'ref_command' => $request->input('ref_command'),
                'user_ip' => $request->ip(),
                'user_lang' => $request->header('Accept-Language'),
                'payment_id' => $request->input('ref_command'), // Utilisation de la même valeur que ref_command pour payment_id
                'payment_method' => $request->input('payment_method'),
                'client_phone' => $request->input('client_phone'),
                'command_name' => $request->input('command_name'),
                'type_event' => $request->input('type_event'),
                'env' => $request->input('env'),
                'custom_field' => json_encode($request->input('custom_field')), // Assurez-vous de traiter les données personnalisées comme requis
            ]);

            $payment->save();
            // Logique supplémentaire si nécessaire

            return response()->json(['message' => 'IPN received and processed'], 200);
        } catch (\Exception $e) {
            // Gestion des erreurs de base de données ou autres erreurs
            return response()->json(['error' => 'Failed to process IPN: ' . $e->getMessage()], 500);
        }
    } else {
        // Clés API invalides
        return response()->json(['error' => 'Invalid IPN request'], 400);
    }
}


    public function handleSuccess(Request $request)
    {
        // Utilisation des accesseurs magiques pour accéder aux données de la requête
        $itemName = $request->item_name;
        $itemPrice = $request->item_price;
        $currency = $request->currency;
        $refCommand = $request->ref_command;
        $userIp = $request->ip();
        $userLang = $request->header('Accept-Language');

        try {
            // Vérifier que toutes les données requises sont présentes
            if (!$itemName || !$itemPrice || !$currency || !$refCommand || !$userIp || !$userLang) {
                throw new \Exception("Certaines données requises sont manquantes.");
            }

            // Enregistrer les détails de la transaction dans la base de données
            Payment::create([
                'item_name' => $itemName,
                'item_price' => $itemPrice,
                'currency' => $currency,
                'status' => 'success', // Ou tout autre statut approprié
                'ref_command' => $refCommand,
                'user_ip' => $userIp,
                'user_lang' => $userLang,
                'payment_id' => uniqid(), // Générer un ID de paiement unique si nécessaire
                'payment_date' => now(), // Utilisation de Carbon pour la date actuelle
            ]);

            // Redirection vers une page de succès ou affichage d'un message de succès
            return view('payment.success', ['paymentId' => $refCommand]);
        } catch (\Exception $e) {
            // Gérer les exceptions si nécessaire
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function handleCancel()
    {
        return view('payment.cancel');
    }
}
