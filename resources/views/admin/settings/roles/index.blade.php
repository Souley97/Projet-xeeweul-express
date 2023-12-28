<x-app-layout>
    <div class="container w-full h-96 py-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Liste des Sondages</h2>
            @if (Auth::user()->is_admin==1)
                
            
            <a href="{{ route('roles.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-transform transform hover:scale-105 duration-300 ease-in-out">
                Créer un role
            </a>
            @endif
        </div>

        <div class="grid grid-cols-3 md:grid-cols-7 lg:grid-cols-3 gap-3 mt-6">
            @foreach($roles as $role)
                    <div class="bg-white rounded-lg mt-8 shadow-md p-4 hover:shadow-lg hover:scale-105 transition-transform duration-300 ease-in-out">
                    <a href="{{route('roles.edit', $role->id)}}" class="text-lg text-blue-950 font-semibold">{{ $role->name }}</a>
                    
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
