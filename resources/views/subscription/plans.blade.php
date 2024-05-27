@can('manage-users', Auth::user())<x-app-layout>



        <div class="bg-white p-2 shadow-md rounded-lg">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-xl font-semibold">Liste des Questions</h1>

                <a href="{{ route('subscription-plans.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Créer un abonnement
                </a>

            </div>

            <table class="min-w-full border">
                <thead>
                    <tr>
                        <th class="py-2 px-4">ID</th>
                        <th class="py-2 px-4">Abonnement</th>
                        <th class="py-2 px-4">Prix</th>
                        <th class="py-2 px-4">Actions</th>
                        <th class="py-2 px-4">Status</th>
                    </tr>
                </thead>
                <tbody class="pr-12">
                    @foreach ($plans as $plan)
                        <tr class="  hover:shadow-lg hover:scale-95 transition-transform duration-300 ease-in-out">
                            <td class="py-2 px-4">{{ $plan->id }}</td>
                            <td class="py-2 px-4">{{ $plan->name }}</td>
                            <td class="py-2 px-4">{{ $plan->price }}</td>
                            <td class="py-2 px-4">
                                {{-- <a href="{{ route('subscription-plans.show', $plan->slug) }}"
                                    class="text-blue-500 hover:underline mr-2">
                                    <button @click="open = true" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                                        Voir
                                    </button>
                                </a> --}}
                                <a href="{{  route('subscription-plans.edit', $plan->slug) }}"
                                    class="text-yellow-500 hover:underline mr-2">
                                    <button @click="open = true" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-700">
                                        Éditer
                                    </button>
                                </a>
                                <form action="{{ route('subscription-plans.destroy', $plan->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">
                                        <button @click="open = true" class="bg-red-400 text-white py-2 px-4 rounded hover:bg-red-700">
                                            Supprimer
                                        </button>
                                    </button>
                                </form>


                                </div>
                            </td>
                            <td class="py-2 px-4"> <form action="{{ route('subscribe', $plan) }}" method="post">
                                @csrf
                                {{-- <button type="submit">S'abonner</button> --}}
                            </form>
                            <div class="left-56    ">
                                @if ($plan->is_active)
                                    <form action="{{ route('subscription-plans.deactivate', $plan->id) }}" method="post">
                                        @csrf
                                        @method('PUT')



                                        <button type="submit"><label
                                                class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" checked value=""
                                                    class="sr-only peer">
                                                <div class="  left-0  "></div>
                                                <div
                                                    class="w-11 h-6 text-white bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                    <div class="-px-2 mr-4    left-0 start-1">1</div>
                                                </div>
                                            </label></button>
                                    </form>
                                @else
                                    <form action="{{ route('subscription-plans.activate', $plan->id) }}" method="post">
                                        @csrf
                                        @method('PUT')


                                        <button type="submit"><label
                                                class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" value="" class="sr-only peer">

                                                <div
                                                    class="w-11 h-6 text-red-500 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                    <div class="-px-2 bold ml-4  z-40  left-0 start-1">0</div>
                                                </div>
                                            </label></button>
                                    </form>
                                @endif</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-app-layout>

@endcan
