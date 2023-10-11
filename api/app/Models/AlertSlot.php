<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertSlot extends Model
{
    use HasFactory;

    protected $fillable = ['alert_id', 'slot_id'];
}
