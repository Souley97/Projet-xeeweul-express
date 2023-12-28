<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
   
    <div>
        <!-- Affichez le code de parrainage généré -->
    
        <!-- Vous pouvez ajouter un bouton pour générer un nouveau code -->
        <button wire:click="generateReferralCode">Générer un nouveau code</button>
    </div>

    <div>
        <p>Votre code de parrainage : {{ generateReferralCode() }}</p>
    </div>
    
</div>
