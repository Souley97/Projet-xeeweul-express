<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initiate Payment</title>
</head>
<body>
    <h1>Initiate Payment</h1>

    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif


    <form action="{{ route('paytech.payment') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="item_name">Item Name:</label>
            <input type="text" class="form-control" id="item_name" name="item_name" required>
        </div>
        <div class="form-group">
            <label for="item_price">Item Price:</label>
            <input type="number" class="form-control" id="item_price" value="100" name="item_price" required>
        </div>
        <div class="form-group">
            <label for="currency">Currency:</label>
            <select class="form-control" id="currency" name="currency">
                <option value="XOF">XOF</option>
                <!-- Ajoutez d'autres options de devises si nécessaire -->
            </select>
        </div>
        <div class="form-group">
            <label for="id">Item ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="1" required>
        </div>
    <br><br>
        <button type="submit">Pay Now</button>
    </form>
</body>
</html>
