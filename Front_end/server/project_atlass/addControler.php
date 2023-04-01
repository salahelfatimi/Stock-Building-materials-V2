<?php


require ("connexion.php");

$data = json_decode(file_get_contents("php://input"),true);

$stm = $con->prepare("SELECT * from `controlerregester` where `idCard` = ?");
$stm -> execute([$data["dataControler"]["idCard"]]);   

$row = $stm->rowCount();


if($row > 0){   
    $returnData = [
        "success" => false ,
        "message" => "worker that he has this id card '".$data["dataControler"]["idCard"]."' already in database try with another id card.",
    ];
    echo json_encode($returnData);
}
else{
        
    //Generate a random string.
    $token = openssl_random_pseudo_bytes(16);
    
    //Convert the binary data into hexadecimal representation.
    $token = bin2hex($token);

    try{
        $con->beginTransaction();

            $stmt=$con->prepare('INSERT INTO `controlerregester` (`idControler`, `fullName`, `idCard`,`Address`,`speciality`,`phoneNum`,`email`,`dateStart`) VALUES (NULL, ?,?,?,?,?,?,?)');
            $stmt -> execute([$data["dataControler"]["fullName"] , $data["dataControler"]["idCard"],$data["dataControler"]["address"],$data["dataControler"]["specialty"],$data["dataControler"]["phoneNumber"],$data["dataControler"]["email"],$data["dataControler"]["dateStart"]] ); 

            $stmt=$con->prepare('INSERT INTO `controlerlogin` (`id`, `username`, `password`,`idCard`,`token`) VALUES (NULL, ?,?,?,?)');
            $stmt -> execute([$data["dataLogin"]["username"],$data["dataLogin"]["password"],$data["dataLogin"]["idCard"],$token]); 

            $returnData = [
                "success" => true ,
                "message" => "the worker is added successfully",
            ];
            echo json_encode($returnData);

        $con->commit();
    }
    catch(PDOException $e){
        $returnData = [
            "success" => false ,
            "message" => "Add worker is fiald",
        ];
        echo json_encode($returnData);
        echo 'not connect.'.$e->getMessage();
        $con->rollback();
    }

}


