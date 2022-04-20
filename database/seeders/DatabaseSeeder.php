<?php

namespace Database\Seeders;

use App\Models\Carrier;
use App\Models\Quote;
use App\Models\QuoteDetail;
use App\Models\Tariff;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Carrier::factory(20)->create();
        Tariff::factory(30)->create();
        Quote::factory(25)->create();
        QuoteDetail::factory(50)->create();
    }
}
