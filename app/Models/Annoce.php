<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Annoce extends Model

{
    use HasFactory;
     protected $fillable = ['titre', 'description', 'chemin_vers_video' , 'realisateur', 'duree_minutes' ];
  
    }




