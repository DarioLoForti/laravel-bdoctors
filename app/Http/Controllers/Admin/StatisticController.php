<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Review;
use App\Models\Doctor;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(int $selected_year)
    {
        // Ottieni l'utente attualmente loggato
        $logged_user = Auth::user();
        if ($logged_user) {
            $logged_in_doctor_id = $logged_user->id;
        }
        // Recupera il dottore associato all'utente loggato.
        // Restituisce un array di lunghezza 1 (relazione one-to-one)
        $doctors = Doctor::where('user_id', '=', $logged_user->id)->get();
        $doctor = $doctors[0];
        // Recupera i messaggi associati al dottore loggato
        $messages = Message::where('doctor_id', '=', $doctor->id)->get();
        //Recupera le recensioni associate al dottore loggato
        $reviews = Review::where('doctor_id', '=', $doctor->id)->get();

        // seleziona l'anno dalla colonna created_at elimina i duplicati distinct(), ordinati orderBy(), recuperati come un array pluck().
        $messages_years = Message::selectRaw('YEAR(created_at) as year')->distinct()->orderBy('year', 'desc')->pluck('year')->toArray();

        $messages_per_month = [];

        for ($i = 1; $i <= 12; $i++) {
            $messages_per_month[$i - 1] = Message::where('doctor_id', $logged_in_doctor_id) // Filtra per il medico loggato
                ->whereYear('created_at', $selected_year)
                ->whereMonth('created_at', $i)
                ->count();
        }

        $selected_year_messages_n = Message::where('doctor_id', $logged_in_doctor_id) // Filtra per il medico loggato
            ->whereYear('created_at', $selected_year)
            ->count();

        // seleziona l'anno dalla colonna created_at elimina i duplicati distinct(), ordinati orderBy(), recuperati come un array pluck().
        $reviews_year = Review::where('doctor_id', $logged_in_doctor_id) // Filtra per il medico loggato
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        $reviews_per_month = [];

        for ($i = 1; $i <= 12; $i++) {
            $reviews_per_month[$i - 1] = Review::where('doctor_id', $logged_in_doctor_id) // Filtra per il medico loggato
                ->whereYear('created_at', $selected_year)
                ->whereMonth('created_at', $i)
                ->count();
        }

        // calcolo la media dei voti avg('vote_id'), che restituisce il valore medio di vote_id delle recensioni in quel mese.
        $avg_ratings_per_month = [];

        for ($i = 1; $i <= 12; $i++) {
            $ratings = Rating::join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
                ->join('doctors', 'doctors.id', '=', 'doctor_rating.doctor_id')
                ->where('doctors.id', $logged_in_doctor_id) // Filtra per il medico loggato
                ->whereYear('ratings.created_at', $selected_year)
                ->whereMonth('ratings.created_at', $i)
                ->selectRaw('avg(doctor_rating.rating_id) as average_rating')
                ->first();

            $avg_ratings_per_month[$i - 1] = $ratings ? $ratings->average_rating : 0;
        }

        // conta il numero totale di recensioni nell'anno selezionato whereYear()
        $selected_year_reviews_n = Review::where('doctor_id', $logged_in_doctor_id) // Filtra per il medico loggato
            ->whereYear('created_at', $selected_year)
            ->count();

        return view('admin.statistics.index', compact('avg_ratings_per_month', 'doctor', 'selected_year', 'selected_year_messages_n', 'selected_year_reviews_n', 'reviews_per_month', 'messages_per_month', 'messages_years'));
    }
}
