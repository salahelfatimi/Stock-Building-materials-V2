<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\chicklist;
use App\Models\controlerlogin;
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
    public function addControler( Request $request){
        $IdidCard=controlerregester::where('idCard',$request['dataControler']['idCard'])->get();
        $count=count($IdidCard);
        if($count>0){
            $returnData = [
                "success" => false ,
                "message" => "worker that he has this id card '".$request["dataControler"]["idCard"]."' already in database.",
            ];
            return  json_encode($returnData);
        }else{

            $token = openssl_random_pseudo_bytes(16);
            $token = bin2hex($token);

            $controlerregester=new controlerregester();
            $controlerregester->fullName=$request->input('dataControler.fullName');
            $controlerregester->idCard=$request->input('dataControler.idCard');
            $controlerregester->Address=$request->input('dataControler.address');
            $controlerregester->speciality=$request->input('dataControler.specialty');
            $controlerregester->phoneNum=$request->input('dataControler.phoneNumber');
            $controlerregester->email=$request->input('dataControler.email');
            $controlerregester->dateStart=$request->input('dataControler.dateStart');
            $controlerregester->save();
            $controlerlogin=new controlerlogin();
            $controlerlogin->username=$request->input('dataLogin.username');
            $controlerlogin->password=$request->input('dataLogin.password');
            $controlerlogin->idCard=$request->input('dataLogin.idCard');
            $controlerlogin->token=$token;
            $controlerlogin->save();

            $returnData = [
                "success" => true ,
                "message" => "the worker is added successfully",
            ];
            echo json_encode($returnData);

        }

    }


    public function getAdminInfo(){
        $getAdminInfo=admin::all();
        echo json_encode($getAdminInfo);
    }

    public function updateFullNameOfAdmin(Request $request){
        $updateFullNameOfAdmin=admin::where('token',$request->token)->first();
        $updateFullNameOfAdmin->ferst_name=$request->first_name;
        $updateFullNameOfAdmin->last_name=$request->last_name;
        $updateFullNameOfAdmin->save();
    }
    public function updateUsername(Request $request){
        $updateUsername=admin::where('token',$request->token)->first();
        $updateUsername->username=$request->username;
        $updateUsername->save();
    }
    public function updatePassword(Request $request){

        $updatePassword=admin::where('token',$request->token)->first();
        $updatePassword->password=$request->password;
        $updatePassword->save();

        $returnData = [
            "success" => true ,
            "message" => "the password is updated successfully",
        ];
        echo json_encode($returnData);

    
    }
}
