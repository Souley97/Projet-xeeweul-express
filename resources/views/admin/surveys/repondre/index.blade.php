<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Répondre au Sondage : {{ $survey->titre }}</h1>

        <form method="post" action="{{ route('survey.submit', $survey->id) }}">
            @csrf
            @foreach ($survey->questions as $question)
                
            <div class="border blo border-gray-300 rounded-lg p-4 mb-4">
                <h2 class="text-lg font-semibold">{{ $question->texte }}</h2>
                @if ($question->type === 'choix_multiple')
                    <div class="mb-4 ">
                        <h3 class="mb-2">Le bon Réponse dans le A , B ou C :</h3>
                        <ul class="bold text-3xl font-semibold mb-2">
                            @foreach ($question->reponses as $key => $option)
                                <li class="flex hover:shadow-lg hover:scale-95 transition-transform duration-300 ease-in-out items-center border-2 shadow-md px rounded-sm mb-2">
                                    <input type="radio" name="responses[{{ $question->id }}][{{ $option->id }}]" value="{{ $option->id }}">
                                    {{ $key+1 }}. {{ $option->reponses }}                                </li>
                            @endforeach
                            {{-- @foreach ($question->reponses as $key => $option)
                            <li class="hover:shadow-lg hover:scale-95 transition-transform duration-300 ease-in-out border-2 shadow-md px rounded-sm mb-2">
                                <input type="radio" name="responses[{{ $question->id }}]"
                                       value="{{ $key }}"
                                       id="{{ $question->id }}_{{ $key }}">
                                <label for="{{ $question->id }}_{{ $key }}">
                                    {{ $key+1 }}. {{ $option->reponses }}
                                </label>
                            </li>
                        @endforeach --}}
                        </ul>
                    </div>
                @elseif ($question->type === 'texte_libre')
                    <textarea name="responses[{{ $question->id }}]"></textarea>
                @endif
            </div>
        @endforeach
        
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Soumettre le sondage
            </button>
        </form>
        
    </div>
</x-app-layout>
