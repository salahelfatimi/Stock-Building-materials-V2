<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);

    $stm = $con->prepare("SELECT * FROM daysworked WHERE idControler = ?");
    $stm -> execute([$data["id"]]);   

    $row = $stm->rowCount();

    if($row > 0){
        // DATE_FORMAT(date, '%Y-%m')
        $stm = $con->prepare("SELECT c.fullName , c.idCard , c.Address , c.speciality , c.phoneNum , c.email ,c.dateStart, DATE_FORMAT(d.dateValidation, '%Y-%m') as dateValidation , d.blocName 
        FROM `controlerregester` c JOIN daysworked d on c.idControler = d.idControler WHERE c.idControler = ?");
        $stm -> execute([$data["id"]]);  

        $row = $stm->rowCount();
        $users = $stm->fetchAll(PDO::FETCH_ASSOC);

        if($row > 0){   
            $returnData = [
                "message" => 'good',
                "fullName" => $users[0]["fullName"], 
                "speciality" => $users[0]["speciality"],
                "controlerinfo"=> $users
            ];
            echo json_encode($returnData);
        }
    }else{
        $returnData = [
            "message" => "there are no details because this worker has not worked at any time",
        ];
        echo json_encode($returnData);
    }
