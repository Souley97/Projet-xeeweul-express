<x-app-layout>
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-semibold mb-4">{{ $video->titre }}</h2>

        <div class="mb-8">
            <video controls class="w-full">
                <source src="{{ asset($video->chemin_vers_video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <div>
            <p class="text-gray-700">{{ $video->description }}</p>
            <p class="text-sm text-gray-500 mt-4">Réalisateur: {{ $video->realisateur ?? 'Non spécifié' }}</p>
            <p class="text-sm text-gray-500">Durée: {{ $video->duree_minutes ? $video->duree_minutes . ' minutes' : 'Non spécifiée' }}</p>
            <p class="text-sm text-gray-500">Date de sortie: {{ $video->date_sortie ? \Carbon\Carbon::parse($video->date_sortie)->format('d/m/Y') : 'Non spécifiée' }}</p>
            <p class="text-sm text-gray-500">Format: {{ $video->format ?? 'Non spécifié' }}</p>
        </div>
    </div>
</x-app-layout>
