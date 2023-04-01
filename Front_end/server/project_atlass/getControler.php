<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);

    // DATE_FORMAT(date, '%Y-%m')
    $stm = $con->prepare("SELECT * FROM `controlerregester` WHERE idControler = ?");
    $stm -> execute([$data["id"]]);  

    $row = $stm->rowCount();
    $users = $stm->fetchAll(PDO::FETCH_ASSOC);

    if($row > 0){   
        $returnData = [
            "fullName" => $users[0]["fullName"], 
            "speciality" => $users[0]["speciality"],
        ];
        echo json_encode($returnData);
    }else{
        $returnData = [];
    }