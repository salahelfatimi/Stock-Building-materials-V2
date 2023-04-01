<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);
    

    $stm = $con->prepare("SELECT c.designation, SUM(c.qtyCompleted) as qtyCompleted, SUM(c.qtyCompleted + c.remainingQty) as toachife,CEILING((SUM(c.qtyCompleted) / COUNT(d.idControler)) ) as rendement FROM chicklist c LEFT JOIN daysworked d ON c.idControler = d.idControler and c.blocName = d.blocName WHERE c.idControler = ? AND c.blocName=? GROUP BY c.designation;  ");
    $stm -> execute([$data["id"]["id"] ,$data["blocName"] ]); 

   
   
    $row = $stm->rowCount();
    $users = $stm->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($users);