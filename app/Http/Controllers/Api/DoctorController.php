<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\Doctor;
use App\Models\User;

class DoctorController extends Controller
{
    public function index()
    {
        $namestring = $_REQUEST['namestring'];
        $city = $_REQUEST['city'];

        /* 
        FA LA RICHIESTA DOVE PRENDE TUTTI I DOTTORI CON LA CITTA'
        E IL NOME RICHIESTO DALL'UTENTE. SE IL CAMPO INSERITO DALL'UTENTE E' 
        VUOTO O INESISTENTE VIENE IGNORATO.
        */

        $doctors = Doctor::with('user')->with('specializations')->where('slug', 'like', '%' . $namestring . '%')->where('city', 'like', '%' . $city . '%')->get();

        $filteredDoctors = [];

        /* 
        CONTROLLA PRIMA SE NELLA REQUEST E' STATA INVIATA UNA SPECIALIZZAZIONE.
        CONTROLLA OGNI SPECIALIZZAZIONE DI OGNI MEDICO PRESO IN PRECEDENZA.
        SE UNA DELLE SPECIALIZZAZIONI DEL MEDICO COMBACIA CON QUELLA INVIATA PER REQUEST, 
        IL MEDICO VIENE SALVATO NEL NUOVO ARRAY. 
        */

        if (isset($_REQUEST['specialization']) && $_REQUEST['specialization'] != '') {
            foreach ($doctors as $doctor) {
                foreach ($doctor->specializations as $specialization) {
                    if (str_contains($specialization->slug, $_REQUEST['specialization'])) {
                        array_push($filteredDoctors, $doctor);
                    }
                }
            }
        } else {
            $filteredDoctors = $doctors;
        }

        if ($doctors != null) {
            return response()->json([
                'success' => true,
                'response' => $filteredDoctors
            ]);
        } else {
            return response()->json([
                'success' => false,
                'response' => 'Il dottore da lei cercato non è stato trovato.'
            ]);
        }
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
                'response' => 'Il dottore da lei cercato non è stato trovato.'
            ]);
        }
    }
}
