<x-app-layout>
    <div class="container">
        <h1>Liste des niveaux d'utilisateurs</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom du niveau</th>
                    <th>Points requis</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userLevels as $userLevel)
                <tr>
                    <td>{{ $userLevel->level_name }}</td>
                    <td>{{ $userLevel->points_required }}</td>
                    <td>
                        <a href="{{ route('user_levels.show', $userLevel) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('user_levels.edit', $userLevel) }}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>