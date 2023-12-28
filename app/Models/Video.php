<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Vinkla\Hashids\Facades\Hashids; // Add this line
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description', 'chemin_vers_video', 'realisateur', 'duree_minutes', 'date_sortie', 'format', 'is_active', 'hashid'];

    public function getRouteKeyName()
    {
        return 'hashid';
    }

    // public function getHashidAttribute()
    // {
    //     return Hashids::encode($this->getKey());
    // }
    public function resolveRouteBinding($value, $field = null)
    {
        // Check if the value is encrypted before decrypting
        if (is_string($value) && Str::startsWith($value, ['encrypted:', 'base64:'])) {
            $value = Crypt::decryptString($value);
        }
    
        return parent::resolveRouteBinding($value, $field);
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
