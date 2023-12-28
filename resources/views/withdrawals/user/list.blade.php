<x-app-layout>
    
    <div class="container bi-sign-turn-left-fill end mx-auto p-6">
        <div class="flex items-center justify-between mb-4">

        <h1 class="text-2xl font-semibold mb-4">Historique des withdrawals</h1>
        <button>                            <a href="{{ route('withdrawals.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-2 p-3 text-[15px] rounded">Demande de retire</a>
        </button>
        </div>
        <table class="min-w-full border rounded-lg">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-200 text-gray-600">ID</th>
                    <th class="px-4 py-2 bg-gray-200 text-gray-600">Montant</th>
                    <th class="px-4 py-2 bg-gray-200 text-gray-600">Méthode de paiement</th>
                    <th class="px-4 py-2 bg-gray-200 text-gray-600">Date demandee</th>
                    <th class="px-4 py-2 bg-gray-200 text-gray-600">Dates valide</th>
                    <th class="px-4 py-2 bg-gray-200 text-gray-600">Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($withdrawals as $withdrawal)
                    <tr>
                        <td class="px-4 py-2">{{ $withdrawal->user->name }}</td>
                        <td class="px-4 py-2 bold">{{ $withdrawal->amount }}</td>
                        <td class="px-4 py-2">{{ $withdrawal->payment_method }}</td>
                        <td class="px-4 py-2">{{ $withdrawal->created_at }}</td>
                        @if ($withdrawal->status=='Validée')
                         <td class="px-4 py-2 bg-lime-200 ">{{ $withdrawal->updated_at }}</td>
                    
                            
                         @elseif ($withdrawal->status=='Rejetée')
                            
                   
                            
                       
                       
                        
                         <td class="px-4 py-3 bg-red-400 text-blue-50">Rejetee de Traitement</td>
     
                         @else
                         <td class="px-4 py-3 bg-red-100"> En cours de Traitement</td>

                             
                       
                            
                        @endif
                        <td class="px-4 py-2">{{ $withdrawal->status }}</td>
                    </tr>

                @endforeach

            </tbody>
            <tfoot >
                <td></td>
                <td></td>
                <td></td>
                <th class=" center relative mr-0 p-6 " >Somme totale des retraits : {{ $totalWithdrawalAmount }}</th>
```
            </tfoot>
        </table>
    </div>
</x-app-layout>