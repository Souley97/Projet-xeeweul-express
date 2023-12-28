<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Vos Réponses au Sondage</h1>

        <div class="border border-gray-300 rounded-lg p-4">
            <h2 class="text-lg font-semibold">{{ $survey->titre }}</h2>
            <p class="text-gray-600 mb-4">{{ $survey->description }}</p>

            <h3 class="text-lg font-semibold mb-2">Vos Réponses :</h3>
            <ul>
                @foreach ($userResponses as $response)
                    <li class="mb-4">
                        <p class="font-semibold">{{ $response->question->texte }}</p>
                        <p>
                            @if ($response->is_correct)
                                <span class="text-green-500">Correct</span>
                            @else
                                <span class="text-red-500">Incorrect</span>
                            @endif
                        </p>
                        <p>{{ $response->response }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    {{-- <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Résultats du Sondage</h1>

        <div class="border border-gray-300 rounded-lg p-4">
            <h2 class="text-lg font-semibold">{{ $survey->titre }}</h2>
            <p class="text-gray-600 mb-4">{{ $survey->description }}</p>

            <h3 class="text-lg font-semibold mb-2">Résultats :</h3>
            <ul>
                @foreach ($questions as $question)
                    <li class="mb-4">
                        <p class="font-semibold">{{ $question->texte }}</p>
                        <ul>
                            @foreach ($question->answers as $answer)
                                <li>
                                    @if ($answer->is_correct)
                                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                    @else
                                        <i class="fas fa-times-circle text-red-500 mr-2"></i>
                                    @endif
                                    {{ $answer->responses }}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div> --}}
</x-app-layout>