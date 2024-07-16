<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Résultats du Sondage</h1>
        <div class="border border-gray-300 rounded-lg p-4">
            <h2 class="text-lg font-semibold">{{ $survey->titre }}</h2>
            <p class="text-gray-600 mb-4">{{ $survey->description }}</p>
            <h3 class="text-lg font-semibold mb-2">Réponses :</h3>
            <ul>
                @foreach ($questions as $question)
                    <li class="mb-4">
                        <p class="font-semibold">{{ $question->texte }}</p>
                        <ul>
                            @if ($question->type === 'choix_multiple')
                                <li>
                                    <strong>Votre Réponse :</strong>
                                    @if (isset($responses[$question->id]))
                                        @foreach ($responses[$question->id] as $response)
                                            {{ $response->option->reponses ?? 'Aucune option associée à cette réponse' }}
                                        @endforeach
                                    @else
                                        Aucune réponse donnée
                                    @endif
                                </li>
                                <li>
                                    <strong>Bonne Réponse :</strong>
                                    @foreach ($question->reponses as $option)
                                        @if ($option->is_correct)
                                            {{ $option->reponses }}
                                        @endif
                                    @endforeach
                                </li>
                            @elseif ($question->type === 'texte_libre')
                                <li>
                                    <strong>Votre Réponse :</strong>
                                    @if (isset($responses[$question->id]))
                                        {{ $responses[$question->id]->first()->option->reponses ?? 'Aucune réponse donnée' }}
                                    @else
                                        Aucune réponse donnée
                                    @endif
                                </li>
                            @endif
                        </ul>
                    </li>
                @endforeach
            </ul>
            <h3 class="text-lg font-semibold mb-2">Total Points: {{ $totalPoints }}</h3>
        </div>
    </div>
</x-app-layout>
