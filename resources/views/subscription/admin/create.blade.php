<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Ajouter un nouveau plan d'abonnement</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('subscription-plans.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nom du plan</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description du plan</label>
                                <textarea name="description" id="description" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="price">Prix du plan</label>
                                <input type="number" name="price" id="price" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="trial_period_days">Période d'essai (en jours)</label>
                                <input type="number" class="form-control" id="trial_period_days" name="trial_period_days">
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter le plan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
