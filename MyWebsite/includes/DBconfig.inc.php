<?php

$dsn="mysql:host=localhost;dbname=user_login";
$dbusername="root";
$dbpassword="";

try{
    $pdo=new PDO($dsn,$dbusername,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
   die("Connection faild: ".$e->getMessage());
}
?>