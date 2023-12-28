<x-app-layout>

    <div class="w-full max-w-md mx-auto mt-10">
        <h1 class="text-2xl font-semibold mb-6">Modifier la Question: {{ $question->text }}</h1>
    
        <form method="POST" action="{{ route('questions.update', $question) }}" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')
    
            <div class="mb-4">
                <label for="texte" class="block text-gray-700 text-sm font-bold mb-2">Texte de la Question</label>
                <input type="text" name="texte" value="{{ $question->texte }}" class="border border-gray-300 p-2 w-full" required>
            </div>
    
            <div class="mb-4">
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type de Question</label>
                <select name="type" class="border border-gray-300 p-2 w-full">
                    <option value="choix_multiple" @if ($question->type == 'choix_multiple') selected @endif>Choix Multiple</option>
                    <option value="texte_libre" @if ($question->type == 'texte_libre') selected @endif>Texte Libre</option>
                </select>
            </div>
    
            <div class="mb-4">
                <label for="survey_id" class="block text-gray-700 text-sm font-bold mb-2">Sondage Associé</label>
                <select name="survey_id" class="border border-gray-300 p-2 w-full">
                    @foreach ($surveys as $survey)
                    <option value="{{ $survey->id }}" @if ($survey->id == $question->survey_id) selected @endif>{{ $survey->titre }}</option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full transition-transform transform hover:scale-105 duration-300 ease-in-out">Mettre à Jour la Question</button>
        </form>
    </div>
{{--     
<div class="bg-white p-6 shadow-md rounded-lg">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-semibold">Éditer la Question</h1>
        <a href="{{ route('questions.index') }}" class="text-blue-500 hover:underline">
            Retour à la Liste des Questions
        </a>
    </div>

    <form action="{{ route('questions.update', $question->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="texte" class="block text-gray-600 font-semibold">Texte de la Question</label>
            <input type="text" name="texte" id="texte" value="{{ $question->texte }}" class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="mb-4">
            <label for="type" class="block text-gray-600 font-semibold">Type de la Question</label>
            <input type="text" name="type" id="type" value="{{ $question->type }}" class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        {{-- Ajoutez d'autres champs d'édition ici, en fonction de votre modèle 

        <div class="flex items-center">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Mettre à jour la Question</button>
        </div>
    </form>
</div> --}}
</x-app-layout>