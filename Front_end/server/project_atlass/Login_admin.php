<?php

    require ("connexion.php");
   
    $data = json_decode(file_get_contents("php://input"),true);
    // var_dump($data)


    $stm = $con->prepare("SELECT * from `admin` where `username` = ? and `password` = ? ");
    $stm -> execute([$data["username"],$data["password"]]);   

    $row = $stm->rowCount();
    $users = $stm->fetchAll(PDO::FETCH_ASSOC);

    if($row > 0){   
        $returnData = [
            "success" => true ,
            "whoLogged"=>"admin",
            "message" => "You have successfully logged in",
            "First_name" => $users[0]["ferst_name"], 
            "Last_name" => $users[0]["last_name"],
            "token"=>$users[0]["token"]
        ];
        echo json_encode($returnData);
    }
    else{

        $stmt = $con->prepare("SELECT R.idControler,R.fullName,R.speciality , L.token FROM controlerregester R JOIN controlerlogin L ON R.idCard=L.idCard WHERE L.username=? AND L.password=?");
        $stmt -> execute([$data["username"],$data["password"]]);  

        $row = $stmt->rowCount();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($row > 0){   
            $returnData = [
                "success" => true ,
                "whoLogged"=>"controler",
                "message" => "You have successfully logged in",
                "idControler" => $users[0]["idControler"],
                "speciality" => $users[0]["speciality"],
                "token"=>$users[0]["token"]
            ];
            echo json_encode($returnData);
        }
        else{
            $returnData = [
                "success" => false ,
                "message" => "failed"
            ];
            echo json_encode($returnData);
        }
}