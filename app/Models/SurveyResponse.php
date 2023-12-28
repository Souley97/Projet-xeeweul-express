<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class SurveyResponse extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'option_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function option()
    {
        return $this->belongsTo(Answer::class, 'option_id');
    }
    public function surveyResponses()
    {
        return $this->hasMany(SurveyResponse::class);
    }
}
