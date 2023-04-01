<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);


    if($data["password"] !== null && $data["token"] !== null){
        $stmt=$con->prepare('UPDATE `admin` SET `password` = ?  WHERE `admin`.`token` = ?;');
        $stmt -> execute([$data["password"],$data["token"], ]); 
    
        $returnData = [
            "success" => true ,
            "message" => "the password is updated successfully",
        ];
        echo json_encode($returnData);
    }else{
        $returnData = [
            "success" => false ,
            "message" => "updating the password is field",
        ];
        echo json_encode($returnData);
    }

   
