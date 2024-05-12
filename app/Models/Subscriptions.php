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

    public function subscribedToPlan($planId)
    {
        return $this->subscriptions()->where('subscription_plan_id', $planId)->exists();
    }

  // Méthode pour vérifier si l'abonnement est actif
  public function isActive()
  {
      return $this->status === 'active';
  }

  // Méthode pour vérifier si l'abonnement est expiré
  public function isExpired()
  {
      return $this->status === 'expired';
  }
}
