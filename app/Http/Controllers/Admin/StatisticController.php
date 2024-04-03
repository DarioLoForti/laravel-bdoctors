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
        // itera i dodici mesi dell'anno calcola il numero di messaggi, whereYear() e whereMonth() 
        // per filtrare i messaggi in base all'anno e al mese correnti
        for ($i = 1; $i <= 12; $i++) {
            $messages_per_month[$i - 1] = Message::whereYear('created_at', $selected_year)->whereMonth('created_at', $i)->count();
        }
        // numero totale di messaggi presenti nell'anno selezionato, whereYear() per filtrare i messaggi solo per l'anno selezionato. count() per contare il numero di risultati.
        $selected_year_messages_n = Message::whereYear('created_at', $selected_year)->count();

        // seleziona l'anno dalla colonna created_at elimina i duplicati distinct(), ordinati orderBy(), recuperati come un array pluck().
        $reviews_year = Review::selectRaw('YEAR(created_at) as year')->distinct()->orderBy('year', 'desc')->pluck('year')->toArray();

        $reviews_per_month = [];
        // itera i dodici mesi dell'anno calcola il numero recensioni, whereYear() e whereMonth() 
        // per filtrare i messaggi in base all'anno e al mese correnti
        for ($i = 1; $i <= 12; $i++) {
            $reviews_per_month[$i - 1] = Review::whereYear('created_at', $selected_year)->whereMonth('created_at', $i)->count();
        }

        // calcolo la media dei voti avg('vote_id'), che restituisce il valore medio di vote_id delle recensioni in quel mese.
        $avg_ratings_per_month = Rating::join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
            ->join('doctors', 'doctor_rating.doctor_id', '=', 'doctors.id')
            ->selectRaw('MONTH(ratings.created_at) as month, YEAR(ratings.created_at) as year, AVG(doctor_rating.rating_id) as average_rating')
            ->groupBy(DB::raw('YEAR(ratings.created_at)'), DB::raw('MONTH(ratings.created_at)'))

            ->orderBy('month')
            ->get();

        foreach ($avg_ratings_per_month as $avg_rating) {
            echo "Anno: " . $avg_rating->year . ", Mese: " . $avg_rating->month . ", Media Voti: " . $avg_rating->average_rating . "<br>";
        }
        // conta il numero totale di recensioni nell'anno selezionato whereYear()
        $selected_year_reviews_n = Review::whereYear('created_at', $selected_year)->count();

        return view('admin.statistics.index', compact('avg_ratings_per_month', 'doctor', 'selected_year', 'selected_year_messages_n', 'selected_year_reviews_n', 'reviews_per_month', 'messages_per_month', 'messages_years'));
    }
}
