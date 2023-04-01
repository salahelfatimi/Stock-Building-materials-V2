<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);

    try{
        $stm = $con->prepare("SELECT * FROM `controlerregester`");
        $stm -> execute();   

        $row = $stm->rowCount();
        $users = $stm->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($users);
    }
    catch(PDOException $e){
        $returnData = [];
        echo json_encode($returnData);
        echo 'not connect.'.$e->getMessage();
    }

    
