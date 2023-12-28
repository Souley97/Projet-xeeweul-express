<x-app-layout>
    @if (Auth::user()->is_admin==1)
    <div class="w-full max-w-md mx-auto mt-10">
        <h1 class="text-2xl font-semibold mb-4">Créer une nouvelle question</h1>

        <form action="{{ route('questions.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                {{-- <label for="texte" class="block text-gray-700 text-sm font-bold mb-2">Texte de la question :</label> --}}
                <input type="text" name="texte" class="border border-gray-300 p-2 w-full" placeholder="Texte de la question" required>
            </div>

            <div class="mb-4">
                <label for="survey_id" class="block text-gray-700 text-sm font-bold mb-2">Sondage Associé :</label>
                <select name="survey_id" class="border border-gray-300 p-2 w-full" required>
                    @foreach ($surveys as $survey)
                        <option value="{{ $survey->id }}">{{ $survey->titre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type de question :</label>
                <select name="type" class="border border-gray-300 p-2 w-full" required>
                    <option value="choix_multiple">Choix multiple</option>
                    <option value="texte_libre">Texte libre</option>
                    <!-- Ajoutez d'autres types de questions si nécessaire -->
                </select>
            </div>

            <h2 class="text-lg font-semibold mt-4">Réponses (cochez la réponse correcte) :</h2>

            @for ($i = 1; $i <= 4; $i++)
                <div class="mb-4">
                    {{-- <label for="reponse{{ $i }}" class="block text-gray-700 text-sm font-bold mb-2">Réponse {{ $i }} :</label> --}}
                    <input type="text" name="reponses[]" class="border border-gray-300 p-2 w-full" placeholder="Réponse {{ $i }}" required>
                    <label for="is_correct{{ $i }}" class="block text-gray-700 text-sm font-bold mt-2">
                        <input type="radio" name="is_correct" value="{{ $i - 1 }}" required>
                        Cochez pour la réponse correcte
                    </label>
                </div>
            @endfor

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Créer la question
            </button>
        </form>
    </div>
    @endif
</x-app-layout>
