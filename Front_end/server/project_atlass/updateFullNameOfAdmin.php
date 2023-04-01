<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);

    $stmt=$con->prepare('UPDATE `admin` SET ferst_name = ? , last_name = ? WHERE `admin`.`token` = ?;');
    $stmt -> execute([$data["first_name"],$data["last_name"],$data["token"], ]); 

    $returnData = [
        "seccess" => true ,
        "message" => "the name of admin is updated successfully",
    ];
    echo json_encode($returnData);
