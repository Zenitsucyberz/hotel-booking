<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Carbon\Carbon;

class DashBoardController extends Controller
{
    public function index()
    {
        $startDate=now();
        $endDate=$startDate->copy()->addDays(7);
        
        $reservations = Reservation::where('check_in_time', '>=', Carbon::parse($startDate))->where('check_in_time', '<=', Carbon::parse($endDate))->get();
        return view('app.dashboard',compact('reservations'));
    
    }
    
}
