<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\DemandRejection;
use App\Notifications\DemandRejected;
use Illuminate\Http\Request;

class DemandsController extends Controller
{
    public function index(Request $request)
    {
        $demands = Demand::with(['document', 'user', 'encloseds', 'rejection', 'documentForm']);
        if ($request->has('q')) {
            $demands = $demands->where('status', 'like', '%'.$request->q.'%');
        }
        return response()->json($demands->paginate());
    }

    public function update(Demand $demand, Request $request)
    {
        $request->validate([
            'status' => 'required|string',
        ]);
        $demand->status = $request->status;
        $demand->save();
        return response()->json([], 201);
    }

    public function reject(Demand $demand, Request $request)
    {
        $request->validate([
            'justification' => 'required|string',
        ]);
        $demandRejection = DemandRejection::create([
            'demand_id' => $demand->id,
            'justification' => $request->justification,
        ]);
        $demand->forceFill(['status' => 'rejete'])->save();
        $demand->user->notify(new DemandRejected($demandRejection));
        return response()->json([], 201);
    }
}
