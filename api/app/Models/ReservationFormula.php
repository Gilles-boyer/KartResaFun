<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationFormula extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'formula_id',
        'number_of_people',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function formula()
    {
        return $this->belongsTo(Formula::class);
    }
}
