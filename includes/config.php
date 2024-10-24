<?php

$host = "";
$username = "";
$password = "";
$database = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
}

catch(PDOException $e) {
    echo "Connection failed:  " . $e->getMessage();
}
?>