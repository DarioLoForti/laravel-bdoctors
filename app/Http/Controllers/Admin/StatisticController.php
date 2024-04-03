<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Review;
use DB;

class StatisticController extends Controller
{
    public function index()
    {
        $messagesByMonth = Message::select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as total'))
            ->groupBy('year', 'month')
            ->get();

        $reviewsByMonth = Review::select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as total'))
            ->groupBy('year', 'month')
            ->get();

        return view('admin.statistics.index', compact('messagesByMonth', 'reviewsByMonth'));
    }
}


