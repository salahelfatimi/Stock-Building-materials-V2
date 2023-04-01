<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);
 
    $stm = $con->prepare("SELECT C.idControler,C.fullName,C.speciality,C.idCard,C.phoneNum FROM `daysworked` D JOIN controlerregester C ON C.idControler=D.idControler  WHERE    DATE_FORMAT(dateValidation, '%Y-%m')= ?");
    $stm -> execute([$data["date"]]);   

    $row = $stm->rowCount();
    $users = $stm->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($users);