<x-app-layout>

    <!-- resources/views/videos/index.blade.php -->

    <div class="container mx-auto p-8">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-semibold">Liste des Annoces</h1>
            @if (Auth::user()->is_admin==1)
            <a href="{{ route('annoces.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                Créer une Annoces
            </a>
            @endif
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($videos as $video)
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <video width="12" height="30" src="{{ asset('storage/annoces/' . $video->chemin_vers_video) }}" alt="Video Thumbnail" class="w-full h-32 object-cover"></video>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $video->titre }}</h3>
                        <p class="text-gray-600">{{ $video->description }}</p>
                        <div class="mt-4 flex items-center">
                            <span class="text-sm text-gray-500">Publié le {{ $video->created_at->format('d/m/Y') }}</span>
                        </div>
                        <a href="{{ route('annoces.show', $video->id) }}#partners" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-eye"></i> Voir
                        </a>
                        <div class="mt-4">
                            <a href="{{ route('annoces.edit', $video->id) }}" class="text-blue-500 hover:underline mr-4">Éditer</a>
                            <form action="{{ route('annoces.destroy', $video->id) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette vidéo?')">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</x-app-layout>
