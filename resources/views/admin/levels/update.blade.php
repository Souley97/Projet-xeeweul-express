<x-app-layout>
    <div class="container">
        <h1>Modifier le niveau d'utilisateur</h1>
        <form method="post" action="{{ route('user_levels.update', $userLevel) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="level_name">Nom du niveau :</label>
                <input type="text" name="level_name" class="form-control" value="{{ $userLevel->level_name }}">
            </div>
            <div class="form-group">
                <label for="points_required">Points requis :</label>
                <input type="number" name="points_required" class="form-control" value="{{ $userLevel->points_required }}">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div> 
</x-app-layout>