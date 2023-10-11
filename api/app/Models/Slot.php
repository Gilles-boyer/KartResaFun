<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_formula_id',
        'start_time',
        'duration',
        'status',
    ];

    public function reservationFormula()
    {
        return $this->belongsTo(ReservationFormula::class)->with("reservation");
    }

    public function alerts()
    {
        return $this->belongsToMany(Alert::class , 'alert_slots');
    }
}
