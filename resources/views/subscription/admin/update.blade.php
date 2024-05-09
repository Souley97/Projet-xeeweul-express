
<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Modifier le plan d'abonnement</div>

                    <div class="card-body">
                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" class="w-full max-w-xs">
                            <form method="POST" action="{{ route('subscription-plans.update', $subscriptionPlan->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                                            Nom du plan
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            name="name" id="name" type="text" placeholder="Nom"  value="{{ $subscriptionPlan->name }}" >
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
                                            type="text" placeholder="Description" value="{{ $subscriptionPlan->description }}" >
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
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="2000" value="{{ $subscriptionPlan->price }}" >

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
                                        value="{{ $subscriptionPlan->trial_period_days }}"    >
                                        @error('trial_period_days')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>

                                {{-- <button type="submit" class="btn btn-primary">Modifier le plan d'abonnement</button> --}}
                                <div class="w-full md:w-1/2 px-3">
                                    <label
                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="interval">
                                       Interval
                                    </label>

                                    <input type="text" id="interval" name="interval"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="3"
                                        value="{{ $subscriptionPlan->interval }}"    >
                                        @error('interval')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                    </div>
                                <button
                                    class="flex-shrink-0 bg-blue-500 hover:bg-bleu-700 border-blue-500 hover:border-bleu-700 text-xs border-4 w-full py-2  text-white px-2 rounded"
                                    type="submit">
Modifier                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
