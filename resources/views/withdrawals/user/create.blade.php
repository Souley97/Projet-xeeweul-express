<x-app-layout>
    <div class="bg-white  p-6 mt-12 shadow-md rounded-lg">

    <h1>Créer une nouvelle demande de retrait</h1>

    <form class="min-w-full  flex border p-6 space-y-4rounded-lg" method="POST" action="{{ route('withdrawals.store') }}">
        @csrf <!-- Pour des raisons de sécurité, utilisez la directive @csrf pour générer le jeton CSRF -->

        {{-- <div  ">
            <label for="amount"p>Montant :</label>
            <input type="text" name="amount" id="amount" class="form-control rounded-md placeholder:text-slate-200 "placeholder='10000'>
        </div> --}}
        <div class=" pr-4">
            <div class="relative">
                <input type="text" name="amount" id="amount" aria-describedby="filled_success_help" class="block rounded-t-lg w-full px-2.5 pb-2.5 pt-5 text-xl dark:text-blue-500 bg-gray-50 dark:bg-gray-100 border-0 border-b-2 border-blue-600 dark:border-blue-500 appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="amount" class="absolute text-xl text-blue-600 dark:text-blue-500 duration-300 transform w-full -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Montant :</label>
            </div>
            {{-- <p id="filled_success_help" class="mt-2 text-xs text-blue-600 dark:text-blue-400"><span class="font-medium">Well done!</span> Some success message.</p> --}}
        </div>

        <div class="form-group">
            <label for="payment_method " class="dark:text-blue-500"> paiement :</label>
            <select name="payment_method" id="payment_method" class="form-control dark:text-blue-500 rounded-md w-full  border-blue-600 dark:border-blue-500 appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <option value="Wave">Wave</option>
                <option value="Orange Money">Orange Money</option>
                <!-- Ajoutez d'autres options de méthodes de paiement si nécessaire -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary bg-blue-500 text-white font-semibold p-3 ml-12 rounded-lg hover:bg-blue-600">Envoyer</button>
    </form>
</div>

</x-app-layout>