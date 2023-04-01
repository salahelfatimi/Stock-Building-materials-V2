<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);

    $stm = $con->prepare("SELECT designationName from designation where speciality = ?");
    $stm -> execute([$data["speciality"]]);   

    $row = $stm->rowCount();
    $users = $stm->fetchAll(PDO::FETCH_ASSOC);

    if($row > 0){   
        $returnData = [
            "designationName" => $users
        ];
        echo json_encode($returnData);
    }
    else{
        $returnData = [
            "seccess" => false ,
            "message" => "failed this controler is not definde"
        ];
        echo json_encode($returnData);
    }