<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\DocumentForm;
use App\Models\DemandRejection;
use App\Mail\DemandRejected;
use App\Mail\DemandValidated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class DemandsController extends Controller
{
    public function index(Request $request, $period = null)
    {
        $demands = DocumentForm::join('demands', 'document_forms.demand_id', '=', 'demands.id')->orderBy('id', 'desc')->where('status', '!=', 'invalid')->select('document_forms.*', 'demands.status', 'demands.id AS d_id');
        if($period) {
            $demands = DocumentForm::join('demands', 'document_forms.demand_id', '=', 'demands.id')->orderBy('id', 'desc')->where('status', '!=', 'invalid')->select('document_forms.*', 'demands.status', 'demands.id AS d_id');
            if($period == 'today') {
                $demands = $demands->whereDate('document_forms.created_at', now());
            }
            if($period == 'week') {
                $now = Carbon::now();
                $weekStart = $now->subDays($now->dayOfWeek)->setTime(0, 0);
                $demands = $demands->whereDate('document_forms.created_at', '>=', $weekStart);
            }
            if($period == 'month') {
                $demands = $demands->whereMonth('document_forms.created_at', Carbon::now()->month);
            }
            if($period == 'year') {
                $demands = $demands->whereYear('document_forms.created_at', Carbon::now()->year);
            }
        }
        if ($request->has('q')) {
            $demands = $demands->where('last_name', 'like', '%' . $request->q . '%')->orWhere('first_name', 'like', '%' . $request->q . '%')->orWhere('job', 'like', '%' . $request->q . '%');
        }
        return response()->json($demands->paginate(8));
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
        $demand->forceFill(['status' => 'rejeté'])->save();
        Mail::to($demand->documentForm->email)->send(new DemandRejected($demand));
        return response()->json([], 201);
    }

    public function validated(Demand $demand, Request $request)
    {
        $demand->forceFill(['status' => 'disponible'])->save();
        Mail::to($demand->documentForm->email)->send(new DemandValidated($demand));
        return response()->json([], 201);
    }
}
