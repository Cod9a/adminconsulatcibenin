<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingsController extends Controller
{
    public function index()
    {
        $meetings = Meeting::query()->with(['user'])->where('deleted', false);
        if (request()->has('date')) {
            $meetings = $meetings->whereDate('meeting_date', '=', request()->get('date'));
        }
        $meetings = $meetings->orderBy('meeting_date', 'desc')->paginate();
        return response()->json($meetings);
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->deleted = true;
        $meeting->save();
        return response()->json([], 201);
    }
}
