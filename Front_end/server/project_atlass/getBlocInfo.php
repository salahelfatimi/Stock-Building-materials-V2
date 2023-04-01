<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);

    $stm = $con->prepare("SELECT C.blocName , R.fullName ,R.speciality ,C.idControler FROM daysworked C JOIN controlerregester R ON R.idControler=C.idControler   ");
    $stm -> execute();   

    $row = $stm->rowCount();
    $users = $stm->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($users);