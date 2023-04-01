<?php

    require ("connexion.php");

    $data = json_decode(file_get_contents("php://input"),true);
    $end=0;

    foreach($data as $item){
        $timestamp = strtotime($item['dateValidation']);
        if($item['designation']!==null && $item['Quantity_Completed']!==null && $item['The_remaining_quantity']!==null && $item['Number_of_Persons']!==null && $item['blocName']!==null && $item['idControler']!==null && $item['dateValidation']){
            $stmt=$con->prepare('INSERT INTO `chicklist` (`idChicklist`,`designation`,`qtyCompleted`,`remainingQty`,`personsNumber`,`blocName`,`idControler`,`dateValidation`) VALUES (NULL, ?,?,?,?,?,?,?)');
            $stmt -> execute([$item['designation'],$item['Quantity_Completed'],$item['The_remaining_quantity'],$item['Number_of_Persons'],$item['blocName'],$item['idControler'],date("Y-m-d", $timestamp)] ); 
            $end++;
        }else{
            $returnData = [
                "success" => false ,
                "message" => "Adding data failed",
            ];
            echo json_encode($returnData);
            break;
        } 
    }
    if($data[0]['designation']!==null && $data[0]['Quantity_Completed']!==null && $data[0]['The_remaining_quantity']!==null && $data[0]['Number_of_Persons']!==null && $data[0]['blocName']!==null && $data[0]['idControler']!==null && $data[0]['dateValidation']){
        $stmt=$con->prepare('INSERT INTO `daysworked` (`id`,`idControler`,`dateValidation`,`blocName`) VALUES (NULL, ?,?,?)');
        $stmt -> execute([$data[0]['idControler'],date("Y-m-d", strtotime($data[0]['dateValidation'])),$data[0]['blocName'] ] ); 
    }else{
        $returnData = [
            "success" => false ,
            "message" => "Adding data failed",
        ];
        echo json_encode($returnData);
    } 

    if($end === count($data)){
        $returnData = [
            "success" => true ,
            "message" => "the data is added successfully",
            "date"=>$data[0]['dateValidation'],
        ];
        echo json_encode($returnData);
    }
