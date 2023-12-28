<x-app-layout>
   
    <div class="container w-full h-96 py-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">{{ $survey->titre }}</h2>
             @if (Auth::user()->is_admin==1)<a href="{{ route('questions.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-transform transform hover:scale-105 duration-300 ease-in-out">
                Créer une Question
            </a>
             @endif
        </div>
        <p class="text-gray-600 mb-4">Description du sondage : {{ $survey->description }}</p>


        <div class="grid grid-cols-3 md:grid-cols-7 lg:grid-cols-3 gap-3 mt-6">
            @foreach ($survey->questions as $question)
                <div
                    class="bg-white rounded-lg mt-8 shadow-md p-4 hover:shadow-lg hover:scale-105 transition-transform duration-300 ease-in-out">
                    <h3 class="text-lg font-semibold">
                              <h2 class="text-lg font-semibold mb-2">Questions :</h2>
                        {{ $question->texte }}
                        
                      
                    </h3>
                    <div class="mt-4">
                        @if ($question && count($question->reponses) > 0)
                            <div class="mb-4 hover:shadow-lg hover:scale-100 transition-transform duration-300 ease-in-out ">
                                <h3 class="text-lg block font-semibold mb-2">Réponses :</h3>
                                <ul class="center justify-center items-center">
                                    @foreach ($question->reponses as $option)
                                        <li
                                            class=" hover:shadow-lg hover:scale-x-125 transition-transform duration-300 ease-in-out flex border-1 mt-3 bg-slate-100  bold text-sm shadow-md rounded-sm mb-2">
                                            @if ($option->is_correct and Auth::user()->is_admin==1)
                                                <span class="fab fa-facebook text-green-500  bg-green-400 mr-2"></span>
                                            @else
                                                <i class="fas fa-times-circle text-red-500 bg-red-400 mr-2"></i>
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
            @endforeach
        </div>
    </div>

    {{-- <div class="container jus w-[50%] clear-none p-4">
        <h1 class="text-2xl font-semibold mb-4">Détails de la Question</h1>

        <div class="border bg-white hover:shadow-lg shadow-slate-300 shadow-xl border-gray-300 rounded-lg p-4">
            <div class="mb-4">
                <p class="text-gray-600 ">Sondage associé : <span class="bg-slate-100 text-bold bold"> {{ $question->survey->titre }}</span></p>

                <h2 class="text-lg font-semibold">{{ $question->texte }}</h2>
            </div>

            @if ($question && count($question->reponses) > 0)
            <div class="mb-4 w-56">
                <h3 class="text-lg font-semibold mb-2">Réponses :</h3>
                <ul>
                    @foreach ($question->reponses as $option)
                        <li class="flex items-center border-2 shadow-md rounded-sm mb-2">
                            @if ($option->is_correct)
                                <span class="fab fa-facebook text-green-500 mr-2"></span>
                            @else
                                <i class="fas fa-times-circle text-red-500 mr-2"></i>
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
    </div> --}}
    
</x-app-layout>
