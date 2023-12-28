<x-app-layout>
    <div class="container">
        <h1>Demandes de retrait en cours</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilisateur</th>
                    <th>Montant</th>
                    <th>Méthode de paiement</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($withdrawalsInProgress as $withdrawal)
                    <tr>
                        <td>{{ $withdrawal->id }}</td>
                        <td>{{ $withdrawal->user->name }}</td>
                        <td>{{ $withdrawal->amount }}</td>
                        <td>{{ $withdrawal->payment_method }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>