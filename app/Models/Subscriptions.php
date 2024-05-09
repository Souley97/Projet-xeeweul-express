<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subscription_plan_id',
        'start_date',
        'end_date',
        'status',
        'payment_method_id'
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le plan d'abonnement
    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }

  

}
