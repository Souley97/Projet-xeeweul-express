<x-app-layout>
    <div class="container w-full h-96 py-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Liste des Sondages</h2>
            @if (Auth::user()->is_admin==1)
                
            
            <a href="{{ route('surveys.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-transform transform hover:scale-105 duration-300 ease-in-out">
                Créer un sondage
            </a>
            @endif
        </div>

        <div class="grid grid-cols-3 md:grid-cols-7 lg:grid-cols-3 gap-3 mt-6">
            @foreach($surveys as $survey)
                    <div class="bg-white rounded-lg mt-8 shadow-md p-4 hover:shadow-lg hover:scale-105 transition-transform duration-300 ease-in-out">
                    <h3 class="text-lg font-semibold">{{ $survey->titre }}</h3>
                    <p class="text-gray-500">{{ $survey->description }} ET {{$survey->createdBy->name}}</p>
                    <div class="mt-4">
                        <a href="{{ route('surveys.show', $survey->id) }}" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-eye"></i> Voir
                        </a>
                        <a href="{{ route('survey.respond', $survey->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Répondre au Sondage
                        </a>
                        {{-- @if ($survey->createdBy)
            <p><strong>Créé par:</strong> {{ $survey->createdBy->name }}</p>
        @endif --}}
        
        {{-- @if ($survey->updatedBy)
            <p><strong>Modifié par:</strong> {{ $survey->updatedBy->name }}</p>
        @endif --}}

                        @if (Auth::user()->is_admin==1)
                            {{-- <a href="{{ route('surveys.edit', $survey->id) }}" class="text-indigo-600 hover:text-indigo-900 ml-2">
                                <i class="fas fa-edit"></i> Modifier
                            </a> --}}
                           
                            {{-- <form action="{{ route('surveys.destroy', $survey->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 ml-2">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form> --}}
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div>{{ $surveys->links()}}</div>
    </div>
</x-app-layout>
