<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class QuestionOption extends Model
{
    // Nom de la table associée au modèle
    protected $table = 'question_options';

    // Colonnes pouvant être remplies par l'utilisateur
    protected $fillable = ['question_id', 'texte_option', 'est_correcte'];

    // Relation avec la question associée
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}