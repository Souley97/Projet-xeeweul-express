<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class SurveyResponse extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'option_id',
    ];


    use Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'titre',
            ],
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getSlugOptions(): array
    {
        return [
            'source' => 'titre',
        ];
    }

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
