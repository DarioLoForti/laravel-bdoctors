<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Review;
use App\Models\Doctor;
use App\Models\Rating;
use App\Models\Sponsorship;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $logged_user = Auth::user();

        $sponsorshipCount = null;
        $validityPeriod = null;

        if ($logged_user) {
            $logged_in_doctor_id = $logged_user->doctor->id;

            // Recupera la sponsorizzazione attiva per il medico loggato
            $activeSponsorship = Doctor::find($logged_in_doctor_id)->sponsorships()
                ->wherePivot('end_timestamp', '>=', now())
                ->get();

            if(count($activeSponsorship)>0){
                $current = $activeSponsorship[0];
                $currentDiff = Carbon::now()->diffInHours(Carbon::parse($activeSponsorship[0]->pivot->end_timestamp));
    
                $future = 0;
    
                for($i = 1; $i<count($activeSponsorship); $i++){
                    $future += $activeSponsorship[$i]->duration;
                }

                $sponsorshipCount = count($activeSponsorship);
                $validityPeriod = $currentDiff + $future;
            }
        }
        $messages_count = [];
        // Query per recuperare il numero di messaggi ricevuti dal medico loggato
        $messages_count = Message::where('doctor_id', $logged_in_doctor_id)->count();

        $reviews_count = [];
        // Query per recuperare il numero di recensioni ricevute dal medico loggato
        $reviews_count = Review::where('doctor_id', $logged_in_doctor_id)->count();

        $ratings_count = [];
        // Query per recuperare il numero di voti ricevuti dal medico loggato
        $ratings_count = Rating::join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
            ->join('doctors', 'doctors.id', '=', 'doctor_rating.doctor_id')
            ->where('doctors.id', $logged_in_doctor_id)
            ->count();




        return view('dashboard', compact('messages_count', 'reviews_count', 'ratings_count', 'validityPeriod', 'sponsorshipCount'));
    }
}
