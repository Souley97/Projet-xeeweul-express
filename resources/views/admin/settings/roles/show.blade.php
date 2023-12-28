<x-app-layout>
   
    <div class="container w-full h-96 py-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">{{ $role->name }}</h2>
             @if (Auth::user()->is_admin==1)<a href="{{ route('roles.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-transform transform hover:scale-105 duration-300 ease-in-out">
                Créer une Role
            </a>
             @endif
        </div>
        <p class="text-gray-600 mb-4">Roles{{ $role->name }}</p>


        <div class="grid grid-cols-3 md:grid-cols-7 lg:grid-cols-3 gap-3 mt-6">
           
        </div>
    </div>

</x-app-layout>
