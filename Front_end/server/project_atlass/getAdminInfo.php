<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);

    $stm = $con->prepare("SELECT * from `admin`");
    $stm->execute();

    $row = $stm->rowCount();

    if($row > 0){
        $admin = $stm->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($admin);
    }else{
        echo "[]";
    }