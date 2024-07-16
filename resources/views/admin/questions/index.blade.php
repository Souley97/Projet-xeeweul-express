<x-app-layout>
    <div class="bg-white p-2 shadow-md rounded-lg">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-semibold">Liste des Questions</h1>
            @if (Auth::user()->is_admin==1)
            <a href="{{ route('questions.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                Créer une Question
            </a>
            @endif
        </div>

        <table class="min-w-full border">
            <thead>
                <tr>
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">Texte</th>
                    <th class="py-2 px-4">Sondage</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody class="pr-12">
                @foreach ($questions as $question)
                    <tr class="  hover:shadow-lg hover:scale-95 transition-transform duration-300 ease-in-out">
                        <td class="py-2 px-4">{{ $question->id }}</td>
                        <td class="py-2 px-4">{{ $question->texte }}</td>
                        <td class="py-2 px-4">{{ $question->survey->titre }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('questions.show', $question->slug) }}"
                                class="text-blue-500 hover:underline mr-2">
                                <button @click="open = true" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                                    Voir
                                </button>
                            </a>
                            <a href="{{ route('questions.edit', $question->id) }}"
                                class="text-yellow-500 hover:underline mr-2">
                                <button @click="open = true" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-700">
                                    Éditer
                                </button>
                            </a>
                            <form action="{{ route('questions.destroy', $question->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">
                                    <button onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette Objet?')" class="bg-red-400 text-white py-2 px-4 rounded hover:bg-red-700">
                                        Supprimer
                                    </button>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
