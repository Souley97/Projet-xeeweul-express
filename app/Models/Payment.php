<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'transaction_id',
    //     'amount',
    //     'currency',
    //     'status',
    //     'customer_email',
    //     'operator_id',
    //     'operator',
    //     'paid_amount',
    //     'paid_currency',
    //     'payment_date',
    //     // Ajoutez d'autres colonnes si nécessaire
    // ];

    protected $fillable = [
      'item_name','item_price','currency','status','ref_command',  'user_ip','user_lang','payment_id'
    ];
    

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'payment_date', // Convertir la colonne 'payment_date' en instance Carbon
    ];

    /**
     * Get the user that owns the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_email', 'email');
    }
}
