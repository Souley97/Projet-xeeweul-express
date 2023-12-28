<x-app-layout>
<div class="container mx-auto p-4">

        
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Questions</h2>

    @foreach ($questions as $question)
        <a href="{{ route('questions.show', $question->id) }}">
            <div class="bg-white shadow-md p-4 rounded mb-4 cursor-pointer">
                <p class="text-lg font-semibold mb-2">{{ $question->texte }}</p>
            </div>
        </a>
    @endforeach
</div>
        <h2 class="text-2xl font-semibold mb-4">Questions</h2>
    
        @foreach ($questions as $question)
            <div class="bg-white shadow-md p-4 rounded mb-4">
                <p class="text-lg font-semibold mb-2">{{ $question->texte }}</p>
    
                @if ($question->type === 'choix_multiple')
                    <ul>
                        @foreach ($question->options as $option)
                            <li class="mb-2">
                                <input type="radio" name="question_{{ $question->id }}" value="{{ $option->id }}">
                                {{ $option->texte_option }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach
    
        <div class="mt-4">
            <!-- Bouton "Suivant" pour charger plus de questions -->
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Suivant</button>
        </div>
    </div>
</x-app-layout>
