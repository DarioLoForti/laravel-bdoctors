<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Rating;

class DoctorRatingPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = Doctor::all();
        
        foreach ($doctors as $doctor) {
            $i = 0;
            $rand = rand(15, 20);

            for($i=0; $i<$rand; $i++){
                $doctor->ratings()->attach(rand(2, 5));
            }
        }
    }
}
