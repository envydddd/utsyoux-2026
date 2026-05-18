<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUpPayment extends Model
{
    use HasFactory;

    protected $table = 'top_up_payments';

    protected $fillable = [
        'user_id', 'player_id', 'order_id', 'amount', 'currency', 'status', 'payment_method', 'transaction_id', 'metadata', 'ip', 'user_agent',
    ];

    protected $casts = [
        'metadata' => 'array',
        'amount' => 'decimal:2',
    ];
}
