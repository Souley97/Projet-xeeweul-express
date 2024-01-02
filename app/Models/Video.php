<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Vinkla\Hashids\Facades\Hashids; // Add this line


class Video extends Model
{
    use HasFactory;


    protected $fillable = ['titre', 'description', 'chemin_vers_video', 'realisateur', 'duree_minutes', 'date_sortie', 'format', 'is_active', 'hashid', 'views' , 'views_count',
    'likes_count',];


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

     public function likesCount()
    {
        return $this->likes()->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class)->where('active', true);
    }
    public function views()
    {
        return $this->hasMany(Video::class);
    }
    // crypte id
//     public function setSlugAttribute($value): void
// {
//     $this->attributes['slug'] = Str::slug($value);
// }
    // Video.php
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'user_favorite_videos', 'video_id', 'user_id')->withTimestamps();
    }


    // public function resolveRouteBinding($value, $field = null)
    // {
    //     return parent::resolveRouteBinding(Crypt::decryptString($value), $field);
    // }



    // Mutator for decoding the 'hashid' attribute
    public function setHashidAttribute($value)
    {
        $this->attributes['hashid'] = Hashids::decode($value)[0];
    }



}
