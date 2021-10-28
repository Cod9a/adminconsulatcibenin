<?php

namespace App\Http\Controllers;

use App\Models\WaitingQueueItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WaitingQueueItemController extends Controller
{
    public function index() {
        return response()->json(WaitingQueueItem::paginate());
    }

    public function store(Request $request) {
        $request->validate([
            'meeting_id' => ['required', 'exists:meetings,id', 'unique:waiting_queue_items,meeting_id'],
            'meeting_date' => ['required', 'date', 'max:255'],
            'meeting_deleted' => ['required', 'in:false,0'],
        ]);

        if (!Carbon::parse($request->meeting_date)->isToday()){
            throw ValidationException::withMessages([
                'meeting_date' => 'Le rendez-vous n\'est pas programme pour aujourd\'hui'
            ]);
        }

        WaitingQueueItem::create([
            'meeting_id' => $request->meeting_id,
        ]);

        return response()->json([], 201);
    }

    public function destroy(WaitingQueueItem $waitingQueueItem) {
        $waitingQueueItem->delete();
        return response()->json([], 201);
    }
}
