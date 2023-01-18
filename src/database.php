<?php
$user = "root";
$pass = "root";
try{
$bdd = new PDO('mysql:host=localhost;dbname=Banque', $user, $pass);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "PDO error".$e->getMessage();
    die();
}
?>