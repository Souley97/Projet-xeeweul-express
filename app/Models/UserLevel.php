<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class UserLevel extends Model
{
    use Sluggable;
    protected $fillable = ['level_name', 'points_required'];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'level_name',
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
            'source' => 'level_name',
        ];
    }

}


