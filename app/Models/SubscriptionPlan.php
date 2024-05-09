<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','price', 'interval', 'trial_period_days'
    ];

    // relation avec les abonnements
public function subscriptions(){
    return $this->hasMany(Subscriptions::class);
}
}



