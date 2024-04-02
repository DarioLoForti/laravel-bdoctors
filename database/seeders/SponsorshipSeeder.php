<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsorship;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sponsorship::create([
            'name' => 'Sponsorizzazione Base',
            'price' => '2.99',
            'duration' => 24,
        ]);

        Sponsorship::create([
            'name' => 'Sponsorizzazione Avanzata',
            'price' => '5.99',
            'duration' => 72,
        ]);

        Sponsorship::create([
            'name' => 'Sponsorizzazione Premium',
            'price' => '9.99',
            'duration' => 144,
        ]);
    }
}
