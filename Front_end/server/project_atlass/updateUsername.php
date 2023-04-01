<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);

    $stmt=$con->prepare('UPDATE `admin` SET username = ? WHERE `admin`.`token` = ?;');
    $stmt -> execute([$data["username"],$data["token"], ]); 

    $returnData = [
        "seccess" => true ,
        "message" => "the username of admin is updated successfully",
    ];
    echo json_encode($returnData);
