<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Referral;
use Illuminate\Support\Str;
use Auth;

class MyReferralCodeGenerator extends Component
{
    public $generatedCode;

    public function generateReferralCode()
    {
        // Générez un code de parrainage unique
        $referralCode = Str::random(6); // Vous pouvez personnaliser la longueur du code

        // Assurez-vous qu'il n'y a pas de doublons
        while (Referral::where('code', $referralCode)->exists()) {
            $referralCode = Str::random(6);
        }

        // Créez un enregistrement de parrainage dans la base de données
        Referral::create([
            'user_id' => Auth::user()->id,
            'code' => $referralCode,
        ]);

        $this->generatedCode = $referralCode;
    }

    public function render()
    {
        return view('livewire.referral-code-generator');
    }
}
