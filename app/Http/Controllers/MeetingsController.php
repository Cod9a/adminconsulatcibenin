<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingsController extends Controller
{
    public function index()
    {
        $meetings = Meeting::query();
        if (request()->has('date')) {
            $meetings = $meetings->whereDate('meeting_date', '=', request()->get('date'));
        }
        $meetings = Meeting::join('demands', 'demands.id', '=', 'meetings.demand_id')->orderBy('meeting_date', 'desc')->join('document_forms', 'demands.id', '=', 'document_forms.demand_id')->select('meetings.*', 'demands.id AS d_id', 'document_forms.last_name', 'document_forms.first_name')->paginate();
        // $meetings = $meetings->orderBy('meeting_date', 'desc')->paginate();
        return response()->json($meetings);
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->deleted = true;
        $meeting->save();
        return response()->json([], 201);
    }
}
