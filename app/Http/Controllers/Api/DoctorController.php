<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = [];

        /* 
        CONTROLLA PRIMA SE NELLA REQUEST E' STATA INVIATA UNA CITTA'.
        SE UNA CITTA' E' STATA RICHIESTA, 
        LA QUERY AL DATABASE PRENDERA' SOLO I MEDICI CON IL VALORE CITTA' SIMILE ALLA RICHIESTA.
        ALTRIMENTI, VERRANNO PRESI TUTTI I MEDICI DEL DATABASE.
        */

        if(isset($_REQUEST['city']) && $_REQUEST['city'] != ''){
            $doctors = Doctor::with('user')->with('specializations')->where('city', 'like', '%'.$_REQUEST['city'].'%')->get();
        }
        else{
            $doctors = Doctor::with('user')->with('specializations')->get();
        }


        $filteredDoctors = [];

        /* 
        CONTROLLA PRIMA SE NELLA REQUEST E' STATA INVIATA UNA SPECIALIZZAZIONE.
        CONTROLLA OGNI SPECIALIZZAZIONE DI OGNI MEDICO PRESO IN PRECEDENZA.
        SE UNA DELLE SPECIALIZZAZIONI DEL MEDICO COMBACIA CON QUELLA INVIATA PER REQUEST, 
        IL MEDICO VIENE SALVATO NEL NUOVO ARRAY. 
        */

        if(isset($_REQUEST['specialization']) && $_REQUEST['specialization'] != ''){
            foreach ($doctors as $doctor){
                foreach ($doctor->specializations as $specialization) {
                    if(str_contains($specialization->slug, $_REQUEST['specialization'])){
                        array_push($filteredDoctors, $doctor);
                    }
                }
            }
        }
        else{
            $filteredDoctors = $doctors;
        }

        return response()->json([
            'success' => true,
            'results' => $filteredDoctors
        ]);
    }

    public function show($slug)
    {
        $doctor = Doctor::with('user')->with('specializations')->where('slug', $slug)->first();

        if ($doctor) {
            return response()->json([
                'success' => true,
                'response' => $doctor
            ]);
        } else {
            return response()->json([
                'success' => false,
                'response' => 'non esiste un dottore con questa specializzazione.'
            ]);
        }
    }
}
