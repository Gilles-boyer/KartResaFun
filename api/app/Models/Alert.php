<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'icon', 'color'];

    public function slots()
    {
         return $this->belongsToMany(Slot::class, 'alert_slot');
    }
}
