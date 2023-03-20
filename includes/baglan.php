<?php

error_reporting(0);

try{
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "fony";
    
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8;options='--client_encoding=UTF8'", $user, $pass);
}

catch (PDOException $ex)
{
    header('Content-Type: application/json');
    exit('[ERROR] Database Connection Failed!');
    die();
}







?>
