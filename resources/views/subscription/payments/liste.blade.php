<x-app-layout>

    {{-- <div class="mt-4">
        {{ $users->links() }} <!-- Afficher la pagination -->
    </div> --}}

    <div class="container mx-auto p-28 mt-12 bg-gray-50 shadow-xl drop-shadow-sm">

        <h2 class="mb-4">Accepted Transactions</h2>
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="text-left" >Transaction ID</th>
                    <th class="text-left" >Amount</th>
                    <th class="text-left" >Currency</th>
                    <th class="text-left" >Status</th>
                    <th class="text-left" >Customer Email</th>
                    <th class="text-left" >Operator ID</th>
                    <th class="text-left" >Operator</th>
                    <th class="text-left" >Paid Amount</th>
                    <th class="text-left" >Payment Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->transaction_id }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->currency }}</td>
                    <td>{{ $payment->status }}</td>
                    <td>{{ $payment->customer_email }}</td>
                    <td>{{ $payment->operator_id }}</td>
                    <td>{{ $payment->operator }}</td>
                    <td>{{ $payment->paid_amount }} {{ $payment->paid_currency }}</td>
                    <td>{{ $payment->payment_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>

