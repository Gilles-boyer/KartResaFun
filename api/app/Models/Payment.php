<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'amount',
        'status',
        'payment_method',
        'comment',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
