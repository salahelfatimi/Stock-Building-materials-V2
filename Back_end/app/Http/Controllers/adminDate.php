<?php

namespace App\Http\Controllers;

use App\Models\chicklist;
use App\Models\daysworked;
use Illuminate\Support\Arr;
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

        $Countcontrolerqty=chicklist::select('designation',
            chicklist::raw('SUM(chicklists.qtyCompleted) as qtyCompleted'),
            chicklist::raw('SUM(chicklists.qtyCompleted + chicklists.remainingQty) as toachife') ,
            chicklist::raw('CEILING(SUM(chicklists.qtyCompleted) / COUNT(D.idControler)) as rendement'))

        ->leftJoin('daysworkeds as D', 'D.idControler', '=', 'chicklists.idControler')
        ->groupBy('designation')
        ->where('chicklists.idControler',$request->id)
        ->get();

        return  json_encode($Countcontrolerqty);
    }

    public function CountcontrolerqtyParBloc(Request $request){

        $Countcontrolerqty=chicklist::select('designation',
            chicklist::raw('SUM(chicklists.qtyCompleted) as qtyCompleted'),
            chicklist::raw('SUM(chicklists.qtyCompleted + chicklists.remainingQty) as toachife') ,
            chicklist::raw('CEILING(SUM(chicklists.qtyCompleted) / COUNT(D.idControler)) as rendement'))

        ->leftJoin('daysworkeds as D',function($join){
            $join->on( 'D.idControler', '=','chicklists.idControler')
            ->on('chicklists.blocName','=','D.blocName');
        })
        ->groupBy('designation')
        ->where('chicklists.idControler',$request->id)
        ->where('chicklists.blocName',$request->blocName)

        ->get();

        return  json_encode($Countcontrolerqty);
    }


    public function CountcontrolerqtyParDate(Request $request){
        $date = $request->input('date');
        $Countcontrolerqty=chicklist::select('designation',
            chicklist::raw('SUM(chicklists.qtyCompleted) as qtyCompleted'),
            chicklist::raw('SUM(chicklists.qtyCompleted + chicklists.remainingQty) as toachife') ,
            chicklist::raw('CEILING(SUM(chicklists.qtyCompleted) / COUNT(D.idControler)) as rendement'))

            ->leftJoin('daysworkeds as D',function($join){
                $join->on( 'D.idControler', '=','chicklists.idControler')
                ->on('chicklists.blocName','=','D.blocName');
            })
        ->groupBy('designation')
        ->where('chicklists.idControler',$request->id)
        ->where(DB::raw("(DATE_FORMAT(D.dateValidation, '%Y-%m'))"), '=', [$date])
        ->get();

        return  json_encode($Countcontrolerqty);
    }

    public function CountcontrolerqtyParDateBloc(Request $request){
        $date = $request->input('date');
        $Countcontrolerqty=chicklist::select('designation',
            chicklist::raw('SUM(chicklists.qtyCompleted) as qtyCompleted'),
            chicklist::raw('SUM(chicklists.qtyCompleted + chicklists.remainingQty) as toachife') ,
            chicklist::raw('CEILING(SUM(chicklists.qtyCompleted) / COUNT(D.idControler)) as rendement'))

            ->leftJoin('daysworkeds as D',function($join){
                $join->on( 'D.idControler', '=','chicklists.idControler')
                ->on('chicklists.blocName','=','D.blocName');
            })
        ->groupBy('designation')
        ->where('chicklists.idControler',$request->id)
        ->where('chicklists.blocName',$request->blocName)
        ->where(DB::raw("(DATE_FORMAT(D.dateValidation, '%Y-%m'))"), '=', [$date])
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

        $workerDetailsParMonth = controlerregester::
        where(DB::raw("(DATE_FORMAT(dateStart, '%Y-%m'))"), '=', $date)->get();
        return json_encode($workerDetailsParMonth);

    }
    public function getBlocInfo(){
       $BlocInfo=daysworked::with('controlerregesters:id,speciality,fullName')->select('blocName','idControler')->get();

        return  json_encode($BlocInfo);

    }
}
