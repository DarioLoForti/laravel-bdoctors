<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index($user_id)
    {
        $doctors = Doctor::all();

        if ($user_id != 0) {
            $doctors = Doctor::with(['specializations'])->where('user_id', $user_id);
        } else {
            $doctors = Doctor::with(['specializations']);
        }

        return response()->json([
            'success' => true,
            'results' => $doctors
        ]);
    }

    public function show($slug)
    {
        $doctor = doctor::with(['specializations'])->where('slug', $slug)->first();

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
