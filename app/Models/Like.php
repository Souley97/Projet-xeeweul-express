<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Like extends Model
{
    protected $fillable = ['user_id', 'video_id', 'active'];

    /**
     * Obtenez la vidéo associée à ce like.
     */
    public function video()
    {
        return $this->belongsTo(Video::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function toggleLike()
    {
        $this->update(['active' => !$this->active]);
    }}
