<div class="bg-white p-12 shadow-md rounded-lg z-10 mt-16">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-semibold">Liste des Sondages</h1>

        @if (Auth::user()->is_admin == 1)
            <a href="{{ route('surveys.create') }}"
                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Créer un Sondage</a>
        @endif

    </div>

    @if (count($surveys) > 0)
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left">Titre</th>
                    <th class="text-left">Description</th>
                    <th class="text-left">Poins</th>

                    @if (Auth::user()->is_admin == 1)
                        <th class="text-left">Actions</th>
                    @endif

                </tr>
            </thead>
            <tbody>
                @foreach ($surveys as $survey)
                    <tr>
                        <td>{{ $survey->titre }}</td>
                        <td>{{ $survey->description }}</td>
                        <td>{{ $survey->recompense_en_points }}</td>

                        @if (Auth::user()->is_admin == 1)
                            <td class="">
                                <a href="{{ route('surveys.edit', $survey->id) }}"
                                    class="text-blue-500 hover:underline"><button @click="open = true" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Éditer</button></a>
                                <form class="inline" action="{{ route('surveys.destroy', $survey->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-500 hover:underline ml-2"><button @click="open = true" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Supprimer</button></button>
                                </form>
                            </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $survey->links() }} <!-- Afficher la pagination -->
        </div>
    @else
        <p>Aucun sondage n'est disponible pour le moment.</p>
    @endif
</div>