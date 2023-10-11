<?php

namespace App\Models;

use App\Models\Slot;
use App\Models\ReservationFormula;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formula extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image_url', 'description', 'price', 'number_of_sessions'];

    public function slots()
    {
        return $this->hasManyThrough(Slot::class, ReservationFormula::class);
    }

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'reservation_formulas')
                    ->withPivot('number_of_people')
                    ->using(ReservationFormula::class)
                    ->withTimestamps();
    }
}
