<?php

// SubscriptionPlanController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use Illuminate\Routing\Controller;

class SubscriptionPlanController extends Controller
{

    public function index()
    {
        $plans = SubscriptionPlan::all()->where('is_active', true);
        return view('subscription.index', compact('plans'));
    }

    public function indexAdmin()
    {
        $plans = SubscriptionPlan::all();
        return view('subscription.plans', compact('plans'));
    }


    public function create()
    {
        return view('subscription.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'trial_period_days' => 'nullable|integer', // Ajoutez une validation pour le champ de période d'essai
        ]);

        // Créez un nouveau plan d'abonnement dans la base de données
        $subscriptionPlan= new  SubscriptionPlan([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'trial_period_days' => $request->input('trial_period_days'),
            // Ajoutez d'autres champs nécessaires pour définir le plan d'abonnement
        ]);

        $subscriptionPlan->save();

        // Redirigez l'utilisateur vers la page de gestion des plans d'abonnement avec un message de succès
        return redirect()->route('subscription-plans.index')->with('success', 'Plan d\'abonnement ajouté avec succès.');
    }
    public function edit($slug)
    {
        $subscriptionPlan = SubscriptionPlan::where('slug',$slug)->first();
        return view('subscription.admin.update', compact('subscriptionPlan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'trial_period_days' => 'nullable|integer',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        $subscriptionPlan = SubscriptionPlan::findOrFail($id);
        $subscriptionPlan->update($request->all());

        return redirect()->route('subscription-plans.index')
            ->with('success', 'Le plan d\'abonnement a été mis à jour avec succès.');
    }


    public function activate($id)
    {
        $subscriptionPlan = SubscriptionPlan::findOrFail($id);
        $subscriptionPlan->update(['is_active' => true]);

        return redirect()->route('subscription-plans.index')->with('success', 'La vidéo a été activée avec succès.');
    }

    public function deactivate($id)
    {
        $subscriptionPlan = SubscriptionPlan::findOrFail($id);
        $subscriptionPlan->update(['is_active' => false]);

        return redirect()->route('subscription-plans.index')->with('success', 'La vidéo a été désactivée avec succès.');
    }

    public function destroy($id)
    {
        $subscriptionPlan = SubscriptionPlan::find($id);
        $subscriptionPlan->delete();

        return redirect()->route('subscription-plans.index')->with('success', 'La vidéo a été supprimée avec succès.');
    }
}
