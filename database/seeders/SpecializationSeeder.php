<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Specialization;


class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = config('specialization');

        foreach ($specializations as $specialization) {
            $new_specialization = new Specialization();

            $new_specialization->name = $specialization;
            $new_specialization->slug = Str::slug($new_specialization->name, '-');
            $new_specialization->save();
        }
    }
}
