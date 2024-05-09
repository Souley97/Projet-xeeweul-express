<?php

// SubscriptionPlanController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use Illuminate\Routing\Controller;

class SubscriptionPlanController extends Controller
{
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
        SubscriptionPlan::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'trial_period_days' => $request->input('trial_period_days'),
            // Ajoutez d'autres champs nécessaires pour définir le plan d'abonnement
        ]);

        // Redirigez l'utilisateur vers la page de gestion des plans d'abonnement avec un message de succès
        return redirect()->route('subscription.plans')->with('success', 'Plan d\'abonnement ajouté avec succès.');
    }
}
