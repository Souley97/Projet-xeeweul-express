<?php
namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use App\Models\Subscriptions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SubscriptionController extends Controller
{
    public function showSubscriptionPlans()
    {
        $plans = SubscriptionPlan::all();
        return view('subscription.plans', compact('plans'));
    }


        // public function subscribe(Request $request , SubscriptionPlan $plan)
        // {
        //     // Valider la requête
        //     $request->validate([
        //         'subscription_plan_id' => 'required|exists:subscription_plans,id',
        //         // Ajoutez d'autres règles de validation au besoin
        //     ]);

        //     // Récupérer l'utilisateur connecté
        //     $user = Auth::user();

        //     // Récupérer le plan d'abonnement sélectionné
        //     $plan = SubscriptionPlan::findOrFail($request->subscription_plan_id);

        //     // Début de la transaction
        //     DB::beginTransaction();

        //     try {
        //         // Créer l'abonnement
        //         $subscription = new Subscriptions([
        //             'user_id' => $user->id,
        //             'subscription_plan_id' => $plan->id,
        //             'start_date' => now(),
        //             'end_date' => now()->addDays($plan->trial_period_days ?? 0),
        //             'status' => 'active', // Vous pouvez modifier le statut selon votre logique
        //             // Ajoutez d'autres attributs au besoin
        //         ]);
        //         $subscription->save();

        //         // Engagez-vous dans la transaction
        //         DB::commit();

        //         // Rediriger l'utilisateur vers une vue de confirmation ou une autre action
        //         return redirect()->route('dashboard')->with('success', 'Abonnement souscrit avec succès !');
        //     } catch (\Exception $e) {
        //         // En cas d'erreur, annulez la transaction
        //         DB::rollback();

        //         // Rediriger l'utilisateur vers une vue d'erreur ou une autre action
        //         return redirect()->route('dashboard')->with('success', 'Abonnement souscrit avec succès !');
        //     }
        // }
          public function subscribe(Request $request, SubscriptionPlan $plan)
    {
        // Vérifier si l'utilisateur est déjà abonné au plan
        if ($request->user()->subscribedToPlan($plan->id)) {
            return redirect()->back()->with('error', 'Vous êtes déjà abonné à ce plan.');
        }
    // Calculer la date de fin de l'abonnement
    $startDate = now(); // Date de début de l'abonnement (maintenant)
    $endDate = $startDate->copy()->addDays($plan->trial_period_days); // Date de fin de l'abonnement (date de début + intervalle du plan)

        // Créer un nouvel abonnement pour l'utilisateur
        $subscription = new Subscriptions([
            'user_id' => $request->user()->id,
            'subscription_plan_id' => $plan->id,
            'start_date' => now(),
            //  'end_date' => now()->addDays($plan->trial_period_days ?? 0),
             'end_date' => $endDate,
            'status' => 'active', // Vous pouvez personnaliser cela en fonction de votre logique
        ]);
        $subscription->save();

        // Rediriger l'utilisateur vers une page de confirmation ou de gestion de l'abonnement
        return redirect()->route('subscription.confirmation')->with('success', 'Abonnement souscrit avec succès.');
    }
    }


