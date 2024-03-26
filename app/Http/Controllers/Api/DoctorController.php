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
        $doctors = Doctor::all();

        return response()->json([
            'success' => true,
            'results' => $doctors
        ]);
    }

    public function show($slug)
    {
        $doctor = Doctor::with(['specializations'])->where('slug', $slug)->first();

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
