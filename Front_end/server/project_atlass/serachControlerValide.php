<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);

    $stm = $con->prepare("SELECT * FROM `chicklist` WHERE idControler=? AND dateValidation=?");
    $stm -> execute([$data["id"],$data["date"]]);   

    $row = $stm->rowCount();
    $users = $stm->fetchAll(PDO::FETCH_ASSOC);

    if($row > 0){   
        $returnData = [
            "success" => true ,
        ];
        echo json_encode($returnData);
    }
    else{
        $returnData = [
            "success" => false ,
            "message" => "failed this controler is not definde"
        ];
        echo json_encode($returnData);
    }