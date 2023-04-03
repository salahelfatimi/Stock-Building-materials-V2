<?php

namespace App\Http\Controllers;

use App\Models\chicklist;
use App\Models\daysworked;
use Illuminate\Http\Request;
use App\Models\controlerregester;
use Illuminate\Support\Facades\DB;

class adminDate extends Controller
{

    public function workerDetails(){
        $workerDetails=controlerregester::all();
        return  json_encode($workerDetails);
    }


    public function Countcontrolerqty(Request $request){
        $Countcontrolerqty=chicklist::where('id', $request->id)
        ->groupBy('designation')
        ->select('designation',
                DB::raw('SUM(qtyCompleted) as qtyCompleted'),
                DB::raw('SUM(qtyCompleted + remainingQty) as toachife'),
                DB::raw('CEILING((SUM(qtyCompleted) / COUNT(DISTINCT idControler))) as rendement'))
        ->get();

        return  json_encode($Countcontrolerqty);
    }


    public function getControlerInfo(Request $request){

        $controlerregester = controlerregester::with('daysworked')->find($request->id);

        $controlerInfo = [
            "message" => 'good',
            "fullName" => $controlerregester->fullName,
            "speciality" => $controlerregester->speciality,
            "controlerinfo" => $controlerregester,
        ];

        return  json_encode($controlerInfo);


    }



    public function workerDetailsParMonth(Request $request){
        $date = $request->input('date');

        $workerDetailsParMonth = daysworked::with('controlerregesters')

        ->where(DB::raw("(DATE_FORMAT(dateValidation, '%Y-%m'))"), '=', $date)->get();
        
        $controlerregestersArray = $workerDetailsParMonth->pluck('controlerregesters')->flatten()->toArray();

        return json_encode($controlerregestersArray);

     }
}
