<?php
namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function showSubscriptionPlans()
    {
        $plans = SubscriptionPlan::all();
        return view('subscription.index', compact('plans'));
    }

    public function subscribe(Request $request, SubscriptionPlan $plan)
    {
        $user = Auth::user();

        // Ici, vous pouvez traiter la souscription de l'utilisateur au plan sélectionné
        // Créez une entrée dans la table des souscriptions avec les détails appropriés

        return redirect()->back()->with('success', 'Vous êtes maintenant abonné au plan ' . $plan->name);
    }
}
