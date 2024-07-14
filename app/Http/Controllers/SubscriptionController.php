<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\Env;

use App\Models\SubscriptionPlan;
use App\Models\Subscriptions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SubscriptionController extends Controller
{
    public function showSubscriptionPlans()
    {
        $subscriptionPlans = SubscriptionPlan::where('is_active', true)->get();

        $plans = SubscriptionPlan::all();
        return view('subscription.index', compact('plans', 'subscriptionPlans'));
    }



    public function subscribe(Request $request, SubscriptionPlan $plan)
    {
        // Vérifier si l'utilisateur est déjà abonné au plan
        if ($request->user()->subscribedToPlan($plan->id)  and $endDate <= now()) {
            return redirect()->back()->with('error', 'Vous êtes déjà abonné à ce plan.');
        }

        // Calculer la date de début et de fin de l'abonnement
        $startDate = now(); // Date de début de l'abonnement (maintenant)
        $endDate = $startDate->copy()->addDays($plan->trial_period_days ?? 0); // Date de fin de l'abonnement (date de début + intervalle du plan)

        // Créer un nouvel abonnement pour l'utilisateur
        $subscription = new Subscriptions([
            'user_id' => $request->user()->id,
            'subscription_plan_id' => $plan->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 'active', // Vous pouvez personnaliser cela en fonction de votre logique
        ]);

        try {
            $subscription->save();
        } catch (\Exception $e) {
            // Gérer l'erreur d'enregistrement de l'abonnement
            return redirect()->back()->with('error', 'Erreur lors de la souscription à l\'abonnement. Veuillez réessayer.');
        }

        // Rediriger l'utilisateur vers une page de confirmation ou de gestion de l'abonnement
        return redirect()->route('subscription.confirmation')->with('success', 'Abonnement souscrit avec succès.');
    }

    public function showAcceptedTransactions()
    {
        $payments = Payment::where('status', 'ACCEPTED')->get();

        return view('subscription.payments.liste', compact('payments'));
    }
    public function confirmation()
    {
        return view('subscription.confirmation');
    }

    public function handlePaymentNotification(Request $request)
    {
        // Vérifier si la notification contient l'ID de transaction
        if (!$request->has('transaction_id')) {
            // Retourner une réponse JSON indiquant que l'ID de transaction est manquant
            return response()->json(['status' => 'error', 'message' => 'Transaction ID missing'], 400);
        }

        // Récupérer l'ID de transaction depuis la requête
        $transaction_id = $request->input('transaction_id');

        // URL de l'API CinetPay pour vérifier le statut du paiement
        // $apiUrl = 'https://app-new.cinetpay.com/transactions/payments/';
        $apiUrl = 'https://api.cinetpay.com/v2/?method=checkPayStatus';


        // Envoyer une requête à l'API CinetPay pour vérifier le statut du paiement
        $response = Http::withHeaders([
            'Content-Type' => 'application/json', // Définir le type de contenu comme JSON
            'apikey' => '15942973496654975ddaeab3.97350916', // Inclure l'API key pour l'authentification
        ])->post($apiUrl, [
                    'cpm_site_id' => '5866754', // Inclure l'ID du site pour l'authentification
                    'cpm_trans_id' => $transaction_id, // Inclure l'ID de transaction à vérifier
                ]);

        // Vérifier si la requête à l'API a échoué
        if (!$response->successful()) {
            // Obtenir le corps de la réponse d'erreur
            $errorBody = $response->body();
            // Enregistrer un message d'erreur dans les logs
            Log::error('Failed to fetch transaction from CinetPay API.', ['response' => $errorBody]);
            // Retourner une réponse JSON indiquant l'échec de la récupération de la transaction
            return response()->json(['status' => 'error', 'message' => 'Failed to fetch transaction', 'error' => $errorBody], 500);
        }

        // Décoder la réponse JSON de l'API
        $response_body = $response->json();

        // Vérifier si la transaction n'est pas acceptée (code != '00')


        // Extraire les données de la transaction de la réponse
        $transaction = $response_body['data'];

        // Récupérer l'utilisateur associé à la transaction via l'email (ou une autre méthode d'identification)
        $user = User::where('email', $transaction['customer_email'])->first();

        // Vérifier si l'utilisateur n'a pas été trouvé
        // if (!$user) {
        //     // Retourner une réponse JSON indiquant que l'utilisateur n'a pas été trouvé
        //     return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        // }

        // Récupérer ou créer un nouvel abonnement pour l'utilisateur
        $subscription = Subscriptions::firstOrNew([
            'user_id' => $user->id, // ID de l'utilisateur
            'subscription_plan_id' => $transaction['plan_id'], // ID du plan d'abonnement (doit être fourni dans les métadonnées ou la transaction)
        ]);

        // Définir la date de début de l'abonnement comme maintenant
        $subscription->start_date = now();
        // Définir la date de fin de l'abonnement en ajoutant la durée du plan (doit être fourni dans les métadonnées ou la transaction)
        $subscription->end_date = now()->addDays($transaction['plan_duration']);
        // Définir le statut de l'abonnement comme "active"
        $subscription->status = 'active';
        // Sauvegarder l'abonnement dans la base de données
        $subscription->save();

        // Créer un tableau avec les informations de la transaction
        $transaction_data = [
            'created_at' => $transaction['created_at'],
            'payment_date' => $transaction['payment_date'],
            'business' => 'xeeweul-express',
            'business_ID' => 5866754,
            'operator' => $transaction['operator'] ?? 'N/A',
            'transaction_id' => $transaction_id,
            'operator_id' => $transaction['operator_id'] ?? 'N/A',
            'phone' => $transaction['phone_number'] ?? 'N/A',
            'paid_amount' => $transaction['amount'],
            'currency' => 'XOF',
            'sync' => 'Y',
            'status' => $transaction['status'],
            'commentaire' => $transaction['comment'] ?? 'N/A',
        ];

        // Sauvegarder les informations de la transaction dans un fichier JSON
        Storage::put("transactions/{$transaction_id}.json", json_encode($transaction_data, JSON_PRETTY_PRINT));

        // Retourner une réponse JSON indiquant que la transaction a été traitée avec succès
        return response()->json(['status' => 'success', 'message' => 'Transaction processed successfully']);
    }


}


