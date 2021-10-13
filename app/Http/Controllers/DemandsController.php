<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;

class DemandsController extends Controller
{
    public function index()
    {
        $demands = Demand::with(['document', 'user', 'encloseds'])->paginate();
        return response()->json($demands);
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
}
