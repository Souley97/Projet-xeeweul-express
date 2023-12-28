<x-app-layout>
<!-- resources/views/videos/create.blade.php -->


    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-semibold mb-4">Ajouter une nouvelle vidéo</h2>
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Erreur !</strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
        </div>
    @endif
        @if (Auth::user()->is_admin==1)
            <a href="{{ route('annoces.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                Créer une Annocs
            </a>
            @endif

        <form action="{{ route('annoces.store') }}" method="post" enctype="multipart/form-data" class="max-w-lg mx-auto">
            @csrf

            <div class="mb-4">
                <label for="titre" class="block text-sm font-medium text-gray-700">Titre :</label>
                <input type="text" name="titre" id="titre" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description :</label>
                <textarea name="description" id="description" class="mt-1 p-2 w-full border rounded-md" required></textarea>
            </div>

            <div class="mb-4">
                <label for="chemin_vers_video" class="block text-sm font-medium text-gray-700">Fichier vidéo :</label>
                <input type="file" name="chemin_vers_video" id="chemin_vers_video" class="mt-1 p-2 w-full border rounded-md" accept="video/*" required>
            </div>

            <div class="mb-4">
                <label for="realisateur" class="block text-sm font-medium text-gray-700">Réalisateur :</label>
                <input type="text" name="realisateur" id="realisateur" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="duree_minutes" class="block text-sm font-medium text-gray-700">Durée (minutes) :</label>
                <input type="number" name="duree_minutes" id="duree_minutes" class="mt-1 p-2 w-full border rounded-md">
            </div>

          
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Ajouter la vidéo
            </button>
        </form>
    </div>

</x-app-layout>
