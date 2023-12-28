<x-app-layout>
    <div class="container mx-auto p-6">

    <h1>Créer une nouvelle demande de retrait</h1>

    <form class="min-w-full border rounded-lg" method="POST" action="{{ route('withdrawals.store') }}">
        @csrf <!-- Pour des raisons de sécurité, utilisez la directive @csrf pour générer le jeton CSRF -->

        <div class="form">
            <label for="amount">Montant :</label>
            <input type="text" name="amount" id="amount" class="form-control">
        </div>

        <div class="form-group">
            <label for="payment_method">Méthode de paiement :</label>
            <select name="payment_method" id="payment_method" class="form-control">
                <option value="Wave">Wave</option>
                <option value="Orange Money">Orange Money</option>
                <!-- Ajoutez d'autres options de méthodes de paiement si nécessaire -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Soumettre la demande</button>
    </form>
</div>

</x-app-layout>