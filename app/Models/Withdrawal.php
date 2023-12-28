<?php
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Withdrawal extends Model
{
    protected $fillable = [
        'amount', // Montant de la demande de retrait
        'payment_method', // Méthode de paiement (Wave, Orange Money, etc.)
        'status', // État de la demande (En attente, Validée, Rejetée, etc.)
        'disabled',
        'user_id', // Clé étrangère vers l'utilisateur qui a effectué la demande
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Relation avec l'utilisateur qui a effectué la demande
    }
    public function enable()
    {
        $this->update(['disabled' => false]);
    }

    // Méthode pour désactiver la demande de retrait
    public function disable()
    {
        $this->update(['disabled' => true]);
    }
 
}
