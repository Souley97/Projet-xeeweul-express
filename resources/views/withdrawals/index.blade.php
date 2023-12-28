<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Demandes de retrait des utilisateurs</h1>

        <div class="mb-4">
            <h2 class="text-lg font-semibold bg-yellow-600">En cours</h2>
            @if (count($withdrawalsInProgress) > 0)


                <table class="min-w-full border rounded shadow-lg ">
                    <thead>
                        @include('withdrawals.table.head')

                    </thead>
                    <tbody>
                        @foreach ($withdrawalsInProgress as $withdrawal)
                            @include('withdrawals.table.body')
                        @endforeach
                        <div class=" text-[19px] py-4 rounded-sm bg-zinc-50"> Total Montant En cour <span
                                class="bg-red-100 bold border-l-2 border-collapse rounded-md">{{ $totalAmountCour }}</span>
                            f cfa</div>
                    </tbody>
                    <!-- Afficher les demandes de retrait en cours -->
                </table>
            @else
                <p>Aucun Demandes En cours pour le moment.</p>
            @endif

        </div>

        <div class="mb-6">
            <h2 class="text-lg font-semibold bg-lime-400">Validées</h2>
            @if (count($withdrawalsValide) > 1)

                <table class="min-w-full border rounded shadow-lg">
                    <!-- Afficher les demandes de retrait validées -->
                    <thead>
                        @include('withdrawals.table.head')

                        <div class=" text-[19px] py-4 rounded-sm bg-zinc-50"> Total Montant Validee <span
                                class="bg-green-100 bold border-l-2 border-collapse rounded-md">{{ $totalAmount }}</span>
                            f cfa</div>

                    </thead>
                    <tbody>
                        @foreach ($withdrawalsValide as $withdrawal)
                        
                            @include('withdrawals.table.body')
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">{{ $withdrawalsValide->links() }} </div>
            @else
                <p>Aucun Demandes valides pour le moment.</p>
            @endif

        </div>

        <div class="mb-4">
            <h2 class="text-lg font-semibold text-white bg-red-500">Rejetées</h2>
            @if (count($withdrawalsRejete) > 0)
                <table class="min-w-full border rounded shadow-lg">
                    <!-- Afficher les demandes de retrait rejetées -->
                    <thead>
                        @include('withdrawals.table.head')
                    </thead>
                    <tbody>
                        @foreach ($withdrawalsRejete as $withdrawal)
                            @include('withdrawals.table.body')
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Aucun Demandes Rejetee pour le moment.</p>
            @endif
        </div>
    </div>
</x-app-layout>
