<!-- resources/views/paytech/payment.blade.php -->


<x-app-layout>
    <div class="container">
    <h2>Initiate Payment</h2>
    <form action="{{ route('paytech.payment') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="item_name">Item Name:</label>
            <input type="text" class="form-control" id="item_name" name="item_name" required>
        </div>
        <div class="form-group">
            <label for="item_price">Item Price:</label>
            <input type="number" class="form-control" id="item_price" name="item_price" required>
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
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <button type="submit" class="btn btn-primary">Pay Now</button>
    </form>
</div>
</x-app-layout>
