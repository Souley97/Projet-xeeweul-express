<x-app-layout>
    <div class="w-full max-w-md mx-auto mt-10">
        <h1 class="text-2xl font-semibold mb-6">Créer une Nouvelle Question</h1>
    
        <form method="POST" action="{{ route('questions.store') }}" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="texte" class="block text-gray-700 text-sm font-bold mb-2">Texte de la Question</label>
                <input type="text" name="texte" class="border border-gray-300 p-2 w-full" required>
            </div>
    
            <div class="mb-4">
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type de Question</label>
                <select name="type" class="border border-gray-300 p-2 w-full">
                    <option value="choix_multiple">Choix Multiple</option>
                    <option value="texte_libre">Texte Libre</option>
                </select>
            </div>
    
            <div class="mb-4">
                <label for="survey_id" class="block text-gray-700 text-sm font-bold mb-2">Sondage Associé</label>
                <select name="survey_id" class="border border-gray-300 p-2 w-full">
                    @foreach ($surveys as $survey)
                    <option value="{{ $survey->id }}">{{ $survey->titre }}</option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full transition-transform transform hover:scale-105 duration-300 ease-in-out">Créer la Question</button>
        </form>
    </div>
{{-- <div class="bg-white p-6 shadow-md rounded-lg">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-semibold">Créer une Nouvelle Question</h1>
        <a href="{{ route('questions.index') }}" class="text-blue-500 hover:underline">
            Retour à la Liste des Questions
        </a>
    </div>

    <form action="{{ route('questions.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="texte" class="block text-gray-600 font-semibold">Texte de la Question</label>
            <input type="text" name="texte" id="texte" class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="mb-4">
            <label for="type" class="block text-gray-600 font-semibold">Type de la Question</label>
            <input type="text" name="type" id="type" class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
        </div> 

        {{-- Ajoutez d'autres champs de création ici, en fonction de votre modèle --}}
            {{-- <div class="flex items-center"> 
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Créer la Question</button>
        </div>
    </form>
</div> --}} 

{{--     
    <div class="container">
        <h2>Créer une nouvelle option de réponse</h2>
    
        <form action="{{ route('question_options.store') }}" method="POST">
            @csrf
    
            <div class="form-group">
                <label for="texte_option">Texte de l'option de réponse</label>
                <input type="text" name="texte_option" id="texte_option" class="form-control">
            </div>
    
            <div class="form-group">
                <label for="est_correcte">Est correcte ?</label>
                <input type="checkbox" name="est_correcte" id="est_correcte" value="1">
            </div>
    
            <button type="submit" class="btn btn-primary">Créer l'option de réponse</button>
        </form>
    </div>
     --}}
</x-app-layout>