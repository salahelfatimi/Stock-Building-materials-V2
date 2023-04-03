<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\chicklist;
use App\Models\controlerlogin;
use App\Models\controlerregester;
use App\Models\daysworked;
use App\Models\designation;
use Illuminate\Http\Request;

class controleDate extends Controller
{

    public function serachControlerValide(Request $request){

        $chicklistDate=chicklist::where('idControler',$request->id)->where('dateValidation',$request->date)->get();

        $chicklistCount=count($chicklistDate);
        if( $chicklistCount > 0){
            $controler=[
                "success" => true,
            ];

            return  json_encode($controler);
        }

    }

    public function ajouteDesignation(Request $request){
        $allDesignation = $request->all();
        foreach ($allDesignation as $Designation) {
            $chicklist=new chicklist();
            $chicklist->designation=$Designation['designation'];
            $chicklist->qtyCompleted=$Designation['Quantity_Completed'];
            $chicklist->remainingQty=$Designation['The_remaining_quantity'];
            $chicklist->personsNumber=$Designation['Number_of_Persons'];
            $chicklist->blocName=$Designation['blocName'];
            $chicklist->idControler=$Designation['idControler'];
            $chicklist->dateValidation=$Designation['dateValidation'];
            $chicklist->save();
        }
        $firstDesignation = array_slice(array_values($allDesignation), 0, 1)[0];
        $daysworked=new daysworked();
        $daysworked->idControler=$firstDesignation['idControler'];
        $daysworked->dateValidation=$firstDesignation['dateValidation'];
        $daysworked->blocName=$firstDesignation['blocName'];
        $daysworked->save();

    }



    public function controlerDetails(Request $request){

        $controlerDetails=controlerregester::find($request->id);

        $controler = [
            "fullName" => $controlerDetails->pluck('fullName')->first(),
            "speciality" => $controlerDetails->pluck('speciality')->first(),
        ];

        return  json_encode($controler);

    }

    public function designationDetails(Request $request){


        $designationDetails=designation::select('designationName')->where('speciality',$request->speciality)->get();

        $designation = [
            "designationName" => $designationDetails
        ];

        return  json_encode($designation);

    }


    public function login(Request $request){

        $controler=controlerlogin::where('username',$request->username)->where('password',$request->password)->get();

        $admin=admin::where('username',$request->username)->where('password',$request->password)->get();

        $controlerCount=count($controler);
        $adminCount=count($admin);

        if( $controlerCount > 0){
                $controler=[
                    "whoLogged"=>"controler",
                    "idControler" => $controler->value('id'),
                    "token"=>$controler->value('token')
                ];
                return  json_encode($controler);

        }else if($adminCount > 0){
                $admin=[
                    "whoLogged"=>"admin",
                    "token"=>$admin->value('token'),
                ];
                return  json_encode($admin);

        }else{
            $valid=[
                "success" => false,
            ];
            return  json_encode($valid);
        }
    }
}
