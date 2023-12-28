<x-app-layout>
    <div class="container">
        <h1>Créer un nouveau niveau d'utilisateur</h1>
        <form method="post" action="{{ route('user_levels.store') }}">
            @csrf
            <div class="form-group">
                <label for="level_name">Nom du niveau :</label>
                <input type="text" name="level_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="points_required">Points requis :</label>
                <input type="number" name="points_required" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
</x-app-layout>