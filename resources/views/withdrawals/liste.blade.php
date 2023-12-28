<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Gestion des demandes de retrait</h1>

        <table class="min-w-full border rounded-lg">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-200 text-gray-600">ID de la demande</th>
                    <th class="px-4 py-2 bg-gray-200 text-gray-600">Montant demandé</th>
                    <th class="px-4 py-2 bg-gray-200 text-gray-600">Méthode de paiement</th>
                    <th class="px-4 py-2 bg-gray-200 text-gray-600">État</th>
                    <th class="px-4 py-2 bg-gray-200 text-gray-600">Demandeur</th>
                    <th class="px-4 py-2 bg-gray-200 text-gray-600">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($withdrawals as $withdrawal)
                    <tr>
                        <td class="px-4 py-2">{{ $withdrawal->id }}</td>
                        <td class="px-4 py-2">{{ $withdrawal->amount }}</td>
                        <td class="px-4 py-2">{{ $withdrawal->payment_method }}</td>
                        <td class="px-4 py-2">{{ $withdrawal->status }}</td>
                        <td class="px-4 py-2">{{ $withdrawal->user->name }} ({{ $withdrawal->user->phone }})</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('withdrawals.validate', $withdrawal->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Valider</a>
                            <a href="{{ route('withdrawals.reject', $withdrawal->id) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Rejeter</a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $withdrawals->links() }} <!-- Afficher la pagination -->
        </div>
    </div>
</x-app-layout>