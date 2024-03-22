<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Specialization;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = config('doctors');
        $result = DB::table('users')->min('id');
        //$result = query("SELECT MAX(user_id) FROM `doctors`"); 

        foreach ($doctors as $doctor) {
            $newDoctor = new Doctor();
            $newDoctor->user_id = $result;
            $user = User::where('id', $result)->first();
            $result++;

            $newDoctor->city = $doctor['city'];
            $newDoctor->phone = $doctor['phone'];
            $newDoctor->image = $doctor['image'];
            $newDoctor->cv = $doctor['cv'];
            $newDoctor->services = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda maxime blanditiis nemo, incidunt reiciendis error recusandae animi consequuntur debitis fugiat suscipit ab esse pariatur, sunt, quisquam perspiciatis reprehenderit itaque sit?";
            $randomCode = '';
            do {
                $randomCode .= chr(rand(65, 90));
            } while (strlen($randomCode) < 8);

            $newDoctor->slug = Str::slug($user['name'] . $user['surname'] . '-' . $randomCode);
            $newDoctor->save();
        }
    }
}
