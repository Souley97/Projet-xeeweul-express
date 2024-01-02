<x-app-layout>

    <div class="container mx-auto p-4">






        <div class="bg-white shadow-md p-4 rounded mb-4">
            <div class="container mx-auto mt-4">
                <h1 class="text-3xl font-bold mb-4">Détails de l'utilisateur</h1>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    {{-- Autres détails de l'utilisateur ici --}}
                    <p>Nom: {{ $user->name }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <p>Rôle actuel:
                        @if($user->roles->isNotEmpty())
                            {{ $user->roles->first()->name }}
                        @else
                            Aucun rôle assigné
                        @endif
                    </p>
                    {{-- Logique pour activer ou désactiver l'utilisateur --}}
                    @if (request()->has('is_active') && request('is_active') === 'false')
                        <p>Statut: Désactivé</p>
                    @else
                        <p>Statut: Activé</p>
                    @endif
                </div>
            </div>
            <h2 class="text-2xl font-semibold mb-4">Mise à Jour de l'Utilisateur</h2>
            @can('manage-users', Auth::user())

            <form method="post" action="{{ route('admin.updateRole', ['userId' => $user->id]) }}">
                @csrf
                @method('put')

                <label for="role">Nouveau rôle :</label>
                <select name="role" id="role">
                    <option value="User" {{ $user->hasRole('User') ? 'selected' : '' }}>Utilisateur</option>
                    <option value="Admin" {{ $user->hasRole('Admin') ? 'selected' : '' }}>Administrateur</option>
                    <option value="SuperAdmin" {{ $user->hasRole('SuperAdmin') ? 'selected' : '' }}>Super Administrateur
                    </option>
                </select>

                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-transform transform hover:scale-105 duration-300 ease-in-out"
                    type="submit">Mettre à jour le rôle</button>

            </form>
            <label for="isAdmin">Etre un admin :</label>

            @if ($user->is_admin)
                <form action="{{ route('user.deactivate', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')



                    <button type="submit"><label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked value="" class="sr-only peer">
                            <div class="  left-0  "></div>
                            <div
                                class="w-11 h-6 text-white bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                <div class="-px-2 mr-4    left-0 start-1">1</div>
                            </div>
                        </label></button>
                </form>
            @else
                <form action="{{ route('user.activate', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')


                    <button type="submit"><label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer">

                            <div
                                class="w-11 h-6 text-red-500 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                <div class="-px-2 bold ml-4  z-40  left-0 start-1">0</div>
                            </div>
                        </label></button>
                </form>
            @endif
            @endcan
        </div>
    </div>


</x-app-layout>
