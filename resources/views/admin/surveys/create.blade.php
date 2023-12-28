<x-app-layout>
    @if (Auth::user()->is_admin==1)
    <div class="bg-white p-6 mt-12 shadow-md rounded-lg">
        
        <div class="p-6">
            <div class="flex items-center p-5 justify-between mb-4">
                <a href="{{ route('surveys.index') }}" class="text-blue-500 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                    </svg>
                    
                </a>
            </div>
            
            <h1 class="text-2xl font-semibold mb-4">Créer un Sondage</h1>
            
            <form action="{{ route('surveys.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="flex flex-col">
                    <label for="titre" class="text-sm font-semibold">Titre du Sondage</label>
                    <input type="text" id="titre" name="titre" class="p-2 rounded-lg" required>
                </div>
                <div class="flex flex-col">
                    <label for="description" class="text-sm font-semibold">Description du Sondage</label>
                    <textarea id="description" name="description" class="p-2 rounded-lg" rows="4" required></textarea>
                </div>
                <div class="flex flex-col">
                    <label for="recompense_en_points" class="text-sm font-semibold">Points du Sondage</label>
                    <input type="text" id="recompense_en_points" name="recompense_en_points" required class="p-2 rounded-lg"
                        required>
                </div>
                <div class="form-group">
                    <label for="montant_recompense">Montant de la récompense en points :</label>
                    <input type="number" name="montant_recompense" id="montant_recompense" class="form-control">
                </div>
    
                <div class="form-group">
                    <label for="date_limite">Date limite du sondage :</label>
                    <input type="date" name="date_limite" id="date_limite" class="form-control" required>
                </div>
                <div>
                    <button type="submit"
                        class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600">Créer</button>
                </div>
            </form>
        </div
    </div>
    
    @endif

</x-app-layout>
