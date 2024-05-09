<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier le plan d'abonnement</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('subscription-plans.update', $subscriptionPlan->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nom du plan</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $subscriptionPlan->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description du plan</label>
                                <textarea class="form-control" id="description" name="description" required>{{ $subscriptionPlan->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="price">Prix (en dollars)</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ $subscriptionPlan->price }}" required>
                            </div>

                            <div class="form-group">
                                <label for="trial_period_days">Période d'essai (en jours)</label>
                                <input type="number" class="form-control" id="trial_period_days" name="trial_period_days" value="{{ $subscriptionPlan->trial_period_days }}">
                            </div>

                            <!-- Ajoutez d'autres champs au besoin -->

                            <button type="submit" class="btn btn-primary">Modifier le plan d'abonnement</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
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
                                            for="name  value="{{ $subscriptionPlan->name }}
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
                                            type="text" placeholder="Description" value=">{{ $subscriptionPlan->description }}" >
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
                                    value="{{ $subscriptionPlan->price }}" >

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


                                <button
                                    class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
                                    type="submit">
                                    Sign Up
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
