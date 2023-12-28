<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Answer extends Model
{
    protected $table = 'answers';

    // Colonnes pouvant être remplies par l'utilisateur
    // protected $fillable = ['question_id', 'texte_option', 'est_correcte'];

    // Relation avec la question associée
    // public function question()
    // {
    //     return $this->belongsTo(Question::class, 'question_id');
    // }
    protected $fillable = ['reponses', 'is_correct']; // Les attributs remplissables

    // Relation avec la question à laquelle cette réponse est associée
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function getRouteKeyName()
    {
        return 'hashid';
    }

    public function getHashidAttribute()
    {
        return Hashids::encode($this->getKey());
    }
    
}