<div>
    <button wire:click="generateReferralCode">Générer un code de parrainage</button>
    @if ($generatedCode)
        <p>Votre code de parrainage : {{ $generatedCode }}</p>
    @endif
</div>
