<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Ajouter un nouveau plan d'abonnement</div>

                    <div class="card-body">
                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" class="w-full max-w-xs">
                            <form method="POST" action="{{ route('subscription-plans.store') }}">
                                @csrf

                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="name">
                                            Nom du plan
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            name="name" id="name" type="text" placeholder="Nom" >
                                            @error('name')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label for="description"
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Description du plan
                                        </label>

                                        <input name="description" id="description"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            type="text" placeholder="Description" >
                                            @error('description')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                        </div>
                                </div> <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"for="price">
                                    Prix du plan
                                </label>

                                <input type="number" name="price" id="price"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="2000"
                                    >

                                    @error('price')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror                                      </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="trial_period_days">
                                            Période d'essai (en jours)n
                                        </label>

                                        <input type="number" id="trial_period_days" name="trial_period_days"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="3"
                                            >
                                            @error('trial_period_days')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                        </div>
                                </div>


                                <button
                                    class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
                                    type="submit">
Ajoute                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
