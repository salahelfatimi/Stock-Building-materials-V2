<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);



   
    $stm = $con->prepare("SELECT c.dateValidation, c.designation, SUM(c.qtyCompleted) as qtyCompleted, SUM(c.qtyCompleted + c.remainingQty) as toachife,CEILING((SUM(c.qtyCompleted) / COUNT(d.idControler)) ) as rendement FROM chicklist c LEFT JOIN daysworked d ON c.idControler = d.idControler and c.blocName = d.blocName WHERE c.idControler = ? and DATE_FORMAT(c.dateValidation, '%Y-%m')= ? and c.blocName=? GROUP BY c.designation;   ");
    $stm -> execute([$data["id"]["id"] ,$data["date"] , $data["blocName"] ]);
   
    $row = $stm->rowCount();
    $users = $stm->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($users);