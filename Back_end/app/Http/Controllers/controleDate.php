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
        $chicklistDate=chicklist::where('idControler',$request['id'])->where('dateValidation',$request['date'])->get();
        $chicklistCount=count($chicklistDate);
        if( $chicklistCount > 0){
            $controler=[
                "success" => true ,

            ];

            return  json_encode($controler);
    }

    }

    public function ajouteDesignation(Request $request){
        $request = $request->all();
        foreach ($request as $request) {
        $chicklist=new chicklist();
        $chicklist->designation=$request['designation'];
        $chicklist->qtyCompleted=$request['Quantity_Completed'];
        $chicklist->remainingQty=$request['The_remaining_quantity'];
        $chicklist->personsNumber=$request['Number_of_Persons'];
        $chicklist->blocName=$request['blocName'];
        $chicklist->idControler=$request['idControler'];
        $chicklist->dateValidation=$request['dateValidation'];
        $chicklist->save();


        }

        $daysworked=new daysworked();
        $daysworked->idControler=$request['idControler'];
        $daysworked->dateValidation=$request['dateValidation'];
        $daysworked->blocName=$request['blocName'];
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

        $designationDetails=designation::where('speciality',$request->speciality);

        $designation = [
            "designationName" => $designationDetails->pluck('designationName')->all(),

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
                    "idControler" => $controler->pluck('id')->first(),
                    "token"=>$controler->pluck('token')->first()
                ];

                return  json_encode($controler);
        }


        if($adminCount > 0){

                $admin=[
                    "whoLogged"=>"admin",
                    "token"=>$admin->pluck('token')->first(),
                ];

                return  json_encode($admin);


        }
    }
}
