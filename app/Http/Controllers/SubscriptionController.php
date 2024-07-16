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
        $payments = Subscriptions::all();

        return view('subscription.payments.liste', compact('payments'));
    }





}


