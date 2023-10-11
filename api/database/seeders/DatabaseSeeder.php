<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Client::factory(2)->create();
        \App\Models\Formula::factory(1)->create();
        \App\Models\Reservation::factory(1)->create();
        \App\Models\Payment::factory(1)->create();
        \App\Models\ReservationFormula::factory(1)->create();
        \App\Models\Slot::factory(2)->create();
        \App\Models\Alert::factory(1)->create();
        \App\Models\AlertSlot::factory(1)->create();
    }
}
