<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $namestring = $request->input('namestring', '');
        $city = $request->input('city', '');
        $reviewOrder = $request->input('reviewOrder');
        $ratingOrder = $request->input('ratingOrder');
        $specialization = $request->input('specialization');

        $sponsored = Doctor::with('user')->with('specializations')
            ->whereHas('sponsorships', function ($q) {
                $q->where('start_timestamp', '<=', Carbon::now());
                $q->where('end_timestamp', '>=', Carbon::now());
            })
            ->get();

        $doctors = Doctor::with('user')->with('specializations')
            ->where('slug', 'like', '%' . $namestring . '%')
            ->where('city', 'like', '%' . $city . '%')
            ->when($reviewOrder, function ($query) use ($reviewOrder) {
                return $query->withCount(['reviews'])->orderBy('reviews_count', $reviewOrder);
            })
            ->when($ratingOrder, function ($query) use ($ratingOrder) {
                return $query->withAvg('ratings', 'rating')->orderBy('ratings_avg_rating', $ratingOrder);
            })
            ->get();

        $filteredSponsored = $sponsored->filter(function ($doctor) use ($specialization) {
            return $this->checkSpecialization($doctor, $specialization);
        });

        $filteredDoctors = $doctors->filter(function ($doctor) use ($specialization) {
            return $this->checkSpecialization($doctor, $specialization);
        });

        $uniqueDoctors = $filteredDoctors->reject(function ($doctor) use ($filteredSponsored) {
            return $filteredSponsored->contains('id', $doctor->id);
        });

        if ($uniqueDoctors->isNotEmpty() || $filteredSponsored->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'sponsored' => $filteredSponsored,
                'doctors' => $uniqueDoctors->values(),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'response' => 'Nessun dottore trovato.',
            ]);
        }
    }

    private function checkSpecialization($doctor, $specialization)
    {
        if (!$specialization) {
            return true;
        }

        foreach ($doctor->specializations as $spec) {
            if (str_contains($spec->slug, $specialization)) {
                return true;
            }
        }

        return false;
    }

    public function show($slug)
    {
        $doctor = Doctor::with('user')->with('specializations')->with('reviews')
            ->where('slug', $slug)
            ->first();

        if ($doctor) {
            return response()->json([
                'success' => true,
                'response' => $doctor,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'response' => 'Il dottore non è stato trovato.',
            ]);
        }
    }
}
