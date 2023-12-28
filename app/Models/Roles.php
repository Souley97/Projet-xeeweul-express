<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Roles extends Model
{

    protected $fillable = [
      'id','name'
    ];
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
