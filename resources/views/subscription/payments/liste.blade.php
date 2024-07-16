<x-app-layout>

    {{-- <div class="mt-4">
        {{ $users->links() }} <!-- Afficher la pagination -->
    </div> --}}

    <div class=" w-f mx-auto p-8 mt-12 bg-gray-50 shadow-xl drop-shadow-sm">

        <h2 class="mb-4">Accepted Transactions</h2>
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="text-left" >Nom</th>
                    <th class="text-left" >Email</th>
                    <th class="text-left" >Methode</th>
                    <th class="text-left" >Montant</th>
                    <th class="text-left" >Date abonnees</th>
                    <th class="text-left" >Date Fin</th>
                    <th class="text-left" >Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->user->name }}</td>
                    <td>{{ $payment->user->email }}</td>
                    <td>{{ $payment->subscriptionPlan->name }}</td>
                    <td>{{ $payment->subscriptionPlan->price }}</td>
                    <td>{{ $payment->created_at }}</td>
                    <td>{{ $payment->end_date }}</td>
                    <td>{{ $payment->status }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>

