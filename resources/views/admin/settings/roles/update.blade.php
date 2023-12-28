
<x-app-layout>
    <div class="bg-white p-6 mt-12 shadow-md rounded-lg">
        <div class="flex items-center p-5 justify-between mb-4">
            {{-- <a href="{{ route('roles.index') }}" class="text-blue-500 hover:underline"> --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                </svg>
                
            {{-- </a> --}}
        </div>
    
        <h1 class="text-xl font-semibold mb-4">Mise à Jour du Sondage</h1>
    
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">name</label>
                <input type="text" name="name" id="name" value="{{ $role->name }}" class="w-full p-2 border rounded">
            </div>
    
            
    
            <div class="flex items-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Mettre à Jour</button>
                <button type="reset" class="ml-4 text-red-500 hover:underline">Réinitialiser</button>
            </div>
        </form>
    </div>
</x-app-layout>