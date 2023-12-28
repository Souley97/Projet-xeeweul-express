<div>
    {{-- Formulaire de mise à jour d'un sondage --}}
    <form wire:submit.prevent="save" method="POST">
        <input type="text" wire:model="survey.titre" placeholder="Titre">
        <textarea wire:model="survey.description" placeholder="Description"></textarea>
        <input type="number" wire:model="survey.recompense_en_points" placeholder="Récompense en points">
        <button type="submit">Enregistrer</button>
               <button wire:click="create">Créer un sondage</button>
        <button wire:click="create">Annuler</button>
    </form>
   

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Récompense en points</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surveys as $survey)
                <tr>
                    <td>{{ $survey->titre }}</td>
                    <td>{{ $survey->description }}</td>
                    <td>{{ $survey->recompense_en_points }}</td>
                    <td>
                        <button wire:click="edit({{ $survey->id }})">Éditer</button>
                        <button wire:click="delete({{ $survey->id }})">Supprimer</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
