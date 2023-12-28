<x-app-layout>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Modifier le Mode de Paiement</h2>
    
        <form method="POST" action="{{ route('payment.update') }}">
            @csrf
            @method('PATCH')
    
            <div class="form-group">
                <label for="payment">Mode de Paiement</label>
                <select name="payment" id="payment" class="form-control">
                    @foreach($paymentOptions as $key => $option)
                        <option value="{{ $key }}" {{ $user->payment == $key ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary p-5 text-[13px] mt-4 ml-44 bg-white hover:bg-slate-300 hover:text-white hover:shadow-current     shadow-sm shadow-current">Enregistrer</button>
        </form>
    </div>
</x-app-layout>