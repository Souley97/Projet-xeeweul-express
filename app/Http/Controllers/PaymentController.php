<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PaymentController extends Controller
{
    public function edit()
    {
        $user = auth()->user(); // Récupérez l'utilisateur connecté
        $paymentOptions = ModelsUser::paymentOptions(); // Récupérez les options de paiement

        return view('payment.edit', compact('user', 'paymentOptions'));
    }

    public function update(Request $request)
    {
        $user = auth()->user(); // Récupérez l'utilisateur connecté
        $paymentOptions = array_keys(User::paymentOptions());

        $request->validate([
            'payment' => 'required|in:'.implode(',', $paymentOptions),
        ]);

        $user->update(['payment' => $request->input('payment')]);
        return redirect()->route('payment.updated');

        // return redirect()->route('dashboard')->with('success', 'Mode de paiement mis à jour avec succès.');
    }
}
