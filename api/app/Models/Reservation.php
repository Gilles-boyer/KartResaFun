<?php

namespace App\Models;

use App\Models\Slot;
use App\Models\Client;
use App\Models\Formula;
use App\Models\Payment;
use App\Models\ReservationFormula;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'date',
        'number_of_adults',
        'number_of_children',
        'number_of_biplace',
        'status',
        'comment'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function reservationFormulas()
    {
        return $this->hasMany(ReservationFormula::class);
    }

    // public function formulas()
    // {
    //     return $this->belongsToMany(Formula::class, 'reservation_formulas')
    //         ->withPivot(['number_of_people', 'id'])
    //     ;
    // }

    public function formulas()
    {
        return $this->belongsToMany(Formula::class, 'reservation_formulas')
                    ->withPivot('number_of_people')
                    ->using(ReservationFormula::class)
                    ->withTimestamps();
    }
}
