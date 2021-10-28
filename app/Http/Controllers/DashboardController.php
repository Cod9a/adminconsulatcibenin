<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\User;
use App\Models\Meeting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show() {
        $nUsers = User::count();
        $nDemands = Demand::count();
        $nMeetingsToday = Meeting::whereDate('meeting_date', now())->count();
        return view('dashboard', compact('nUsers', 'nDemands', 'nMeetingsToday'));
    }
}
