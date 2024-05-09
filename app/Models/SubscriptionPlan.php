<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','price', 'interval','is_active', 'trial_period_days'
    ];

    // relation avec les abonnements
public function subscriptions(){
    return $this->hasMany(Subscriptions::class);
}
use Sluggable;
public function sluggable(): array
{
    return [
        'slug' => [
            'source' => 'name',
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
        'source' => 'name',
    ];
}

}



