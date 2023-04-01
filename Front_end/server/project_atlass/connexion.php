<?php

try{
    
    header("Access-Control-Allow-Origin: * ");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: post");
    header('Access-Control-Allow-Headers: Content-Type');

    $db = "mysql:host=localhost;dbname=project_atlass";
    $user = "root";
    $pass = "";

    $con = new PDO($db,$user,$pass);


}catch(PDOException $e){
    "feiled".$e->getMessage();
}