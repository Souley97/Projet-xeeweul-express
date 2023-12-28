<x-app-layout>
    <div class="container jus w-[50%] clear-none p-4">
        <h1 class="text-2xl font-semibold mb-4">Détails de la Question</h1>

        <div class="border  bg-white hover:shadow-lg shadow-slate-300 shadow-xl border-gray-300 rounded-lg p-4">
            <div class="mb-4">
                <p class="text-gray-600 ">Sondage associé : <span class="bg-slate-100 text-bold bold"> {{ $question->survey->titre }}</span></p>

                <h2 class="text-lg   font-semibold"> Question: <span class="bg-slate-100 text-bold bold">{{ $question->texte }}</span></h2>
            </div>

            @if ($question && count($question->reponses) > 0)
            <div class="mb-4 w-full">
                <h3 class="  mb-2">Réponses :</h3>
                <ul class="bold text-3xl  font-semibold mb-2">
                    @foreach ($question->reponses as $option)
                        <li class="flex items-center border-2 shadow-md rounded-sm mb-2">
                            @if ($option->is_correct)
                                <span class="fab fa-facebook bg-green-400 text-green-500 mr-2"></span>
                            @else
                                <i class="fas fa-times-circle text-red-400 bg-red-500 mr-2"></i>
                            @endif
                            <span>{{ $option->reponses }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            @else
            <p class="text-red-500">La question n'existe pas ou n'a pas d'options.</p>
            @endif
        </div>
    </div>
</x-app-layout>
