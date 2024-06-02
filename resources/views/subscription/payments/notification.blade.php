<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification de Paiement</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Notification de Paiement
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ url('/payment/notification ') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="transaction_id">ID de la Transaction</label>
                        <input type="text" class="form-control" id="transaction_id" name="transaction_id" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer la Notification</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
