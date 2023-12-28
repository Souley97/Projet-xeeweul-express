<?php
// app/Survey.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Survey extends Model
{
    protected $table = 'surveys'; // Nom de la table dans la base de données

    protected $primaryKey = 'id';

    protected $fillable = [
        'titre', 'description', 'montant_recompense', 'date_limite', 'recompense_en_points', 'created_by', 'updated_by'
    ]; 

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }
     public function updatedBy() {
        return $this->belongsTo(User::class, 'updated');
     }    
    
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
    // public function questions()
    // {
    //     return $this->hasMany(Question::class);
    // }

    // Relation avec le modèle QuestionOption (une question peut avoir plusieurs options de réponse)
    public function options()
    {        return $this->hasMany(QuestionOption::class);
    }
    public function respond(Survey $survey)
{
    return view('surveys.respond', compact('survey'));
}






    // Relation One-to-Many avec Question : Un sondage peut avoir plusieurs questions.
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Relation Many-to-Many avec User : Plusieurs utilisateurs peuvent répondre à un même sondage.
    public function users()
    {
        return $this->belongsToMany(User::class, 'survey_user')->withTimestamps();
    }
    

}
