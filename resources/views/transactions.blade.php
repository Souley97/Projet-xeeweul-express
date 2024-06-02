<!-- resources/views/transactions.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Transactions</title>
</head>
<body>
    <h1>Liste des Transactions</h1>

    @if(isset($transactions) && count($transactions) > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Montant</th>
                    <th>Devise</th>
                    <th>Date de paiement</th>
                    <th>Heure de paiement</th>
                    <th>Statut</th>
                    <th>Message d'erreur</th>
                    <th>Client</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction['cpm_trans_id'] }}</td>
                        <td>{{ $transaction['cpm_amount'] }}</td>
                        <td>{{ $transaction['cpm_currency'] }}</td>
                        <td>{{ $transaction['cpm_payment_date'] }}</td>
                        <td>{{ $transaction['cpm_payment_time'] }}</td>
                        <td>{{ $transaction['cpm_trans_status'] }}</td>
                        <td>{{ $transaction['cpm_error_message'] }}</td>
                        <td>{{ $transaction['cel_phone_num'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune transaction trouvée.</p>
    @endif
</body>
</html>
