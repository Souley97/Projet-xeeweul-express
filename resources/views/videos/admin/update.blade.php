<x-app-layout>
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-semibold mb-4">Modifier la vidéo</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Erreur !</strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('videos.update', $video->id) }}" method="post" enctype="multipart/form-data" class="max-w-lg mx-auto">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="titre" class="block text-sm font-medium text-gray-700">Titre :</label>
                <input type="text" name="titre" id="titre" class="mt-1 p-2 w-full border rounded-md" value="{{ old('titre', $video->titre) }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description :</label>
                <textarea name="description" id="description" class="mt-1 p-2 w-full border rounded-md" required>{{ old('description', $video->description) }}</textarea>
            </div>
           

            <div class="mb-4">
                <label for="realisateur" class="block text-sm font-medium text-gray-700">Réalisateur :</label>
                <input type="text" name="realisateur" id="realisateur" class="mt-1 p-2 w-full border rounded-md" value="{{ old('realisateur', $video->realisateur) }}">
            </div>

            <div class="mb-4">
                <label for="duree_minutes" class="block text-sm font-medium text-gray-700">Durée (minutes) :</label>
                <input type="number" name="duree_minutes" id="duree_minutes" class="mt-1 p-2 w-full border rounded-md" value="{{ old('duree_minutes', $video->duree_minutes) }}">
            </div>
            <!-- Other form fields... -->

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Modifier la vidéo
            </button>
        </form>
    </div>

</x-app-layout>
