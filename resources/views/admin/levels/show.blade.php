<x-app-layout>

    <div class="container">
    <h1>Détails du niveau d'utilisateur</h1>
    <p><strong>Nom du niveau :</strong> {{ $userLevel->level_name }}</p>
    <p><strong>Points requis :</strong> {{ $userLevel->points_required }}</p>
    <a href="{{ route('user_levels.index') }}" class="btn btn-primary">Retour</a>
</div>
</x-app-layout>