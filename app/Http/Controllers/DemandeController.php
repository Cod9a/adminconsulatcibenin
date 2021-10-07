<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demand;
use App\Models\User;
use App\Models\Information;
use Illuminate\Support\Facades\DB;

class DemandeController extends Controller
{

    public function demandelist(){
        $demande = DB::table('demands')
        ->join('documents', 'documents.id', '=', 'demands.document_id')
        ->join('users', 'users.id', '=', 'demands.user_id')
        ->select('users.nom','users.prenom','documents.*','demands.created_at','demands.status')
        ->get();

        $reponse = json_encode(array('data' => $demande), TRUE);

        return $reponse;

    }
}


