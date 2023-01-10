<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use App\Models\Domaine;
use App\Models\Memoire;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function userChart(){
        $user = User::all()->count();
        $schools = School::all()->count();
        $departs = Departement::all()->count();
        $domaine = Domaine::all()->count();
        $memoires = Memoire::all()->count();
        return response()->json(['message'=>'total of user',$user-1, $schools,$departs,$domaine,$memoires], 200);
        //return $user-1;
    }

    public function memoireChart(){
        $memoires = Memoire::select(DB::raw("COUNT(*) as count"))
        ->whereYear("created_at",date("Y"))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck("count");

        $fromjan = date('2022-01-01');
        $tojan = date('2022-01-31');

        $fromfev = date('2022-02-01');
        $tofev = date('2022-02-28');
        
        $jan = Memoire::whereBetween('created_at', [$fromjan, $tojan])->count();
        $fev = Memoire::whereBetween('created_at', [$fromfev, $tofev])->count();
        // $data = "";
        // foreach($memoires as $val){
        //     $data = "['".$val->created_at."']";
        // }

    //    $memoires = DB::table('memoires')
    //   ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
    //   ->groupBy('date')
    //   ->get();
    return response()->json(['message'=>'Statistique of memoire',$jan, $fev], 200);
        //return $jan;
    }
}
