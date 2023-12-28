<x-app-layout>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Répondre à la question</h2>
    
        <div class="bg-white shadow-md p-4 rounded mb-4">
            <p class="text-lg font-semibold mb-2">{{ $question->texte }}</p>
    
            @if ($question->type === 'choix_multiple')
                <form action="{{ route('questions.answer', $question->id) }}" method="POST">
                    @csrf
                    <ul>
                        @foreach ($question->options as $option)
                            <li class="mb-2">
                                <label>
                                    <input type="radio" name="option_id" value="{{ $option->id }}">
                                    {{ $option->texte_option }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Répondre</button>
                </form>
            @else
                <!-- Autre logique pour d'autres types de questions (par exemple, texte libre) -->
            @endif
        </div>
    </div>
</x-app-layout>
