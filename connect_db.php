<?php
$servername = 'localhost';
$serveruser = 'root';
$password = '';


try {
    $conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}


 catch(PDOException $e){
        die('Error connecting to the database');}
    