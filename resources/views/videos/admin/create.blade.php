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
      
        <form id="upload-form" action="{{ route('videos.store') }}" method="post" enctype="multipart/form-data" class="max-w-lg mx-auto">
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
          {{-- loading --}}
          <div id="loading-overlay" class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center">
            <div class="spinner-border text-primary" role="status">
                <div id="loading-spinner"></div>

                <span class="sr-only">Chargement...</span>
            </div>
            <div id="loading-seconds" class="text-white text-2xl ml-2"></div>
        </div>
        
    
    </div>
   
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var uploadForm = document.getElementById('upload-form');
            var loadingOverlay = document.getElementById('loading-overlay');
            var loadingSpinner = document.getElementById('loading-spinner');
            var loadingSeconds = document.getElementById('loading-seconds');

            uploadForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Empêche le formulaire d'être soumis immédiatement

                // Affiche l'indicateur de chargement
                loadingOverlay.classList.remove('hidden');

                // Démarre l'animation du spinner et le compte à rebours
                startLoadingAnimation();

                // Soumet le formulaire manuellement après un délai de 100ms (ajustez selon vos besoins)
                setTimeout(function () {
                    uploadForm.submit();
                }, 100);
            });

            function startLoadingAnimation() {
                var seconds = 0;
                var loadingInterval = setInterval(function () {
                    // Met à jour le nombre de secondes écoulées
                    loadingSeconds.innerText = seconds + 's';
                    seconds++;

                    // Arrête l'animation après un certain nombre de secondes (par exemple, 10 secondes)
                    if (seconds > 2222110) {
                        clearInterval(loadingInterval);
                        // Cache l'indicateur de chargement lorsque le chargement est terminé
                        loadingOverlay.classList.add('hidden');
                    }
                }, 1000); // Mettez à jour toutes les 1000 ms (1 seconde)
            }
        });
    </script>
    <style>  #loading-spinner {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    #loading-seconds {
        font-size: 2em;
        margin-top: 10px;
    }

    .hidden {
        display: none;
    }</style>
   

</x-app-layout>
