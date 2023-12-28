<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Question extends Model
{
    protected $table = 'questions'; // Le nom de la table

public function questions(){
    return $this->hasMany(Question::class);
}
    // app/Question.php



    // Colonnes pouvant être remplies par l'utilisateur
    protected $fillable = ['texte', 'type', 'survey_id' , 'created_by', 'updated_by'];

    // Relation avec l'enquête associée
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }
    public function reponses()
    {
        return $this->hasMany(Answer::class);
    }

    public function respondents()
{
    return $this->belongsToMany(User::class, 'user_answers', 'question_id', 'user_id')
        ->withPivot('answer_id');
}
public function surveys()
{
    return $this->belongsTo(Survey::class);
}

public function answers()
{
    return $this->hasMany(Answer::class);
}
public function createdBy() {
    return $this->belongsTo(User::class, 'created_by');
}
 public function updatedBy() {
    return $this->belongsTo(User::class, 'updated');
 } 
 public function userResponses()
 {
     return $this->hasOne(SurveyResponse::class)->where('user_id', auth()->id());
 }
  
}


  

