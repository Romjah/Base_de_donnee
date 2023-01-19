<?php
    
        $id_bank = $_GET["id_bank"];
        $montant = $_GET["montant"];
        $id_money = $_GET["id_money"];
        $nom_monnaie = $_GET["nom_monnaie"];
    

$host = "localhost";
$user = "root";
$pass = "root";
$nbdd = "Banque";

try {
    $conn = new PDO("mysql:host=$host;dbname=$nbdd", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO deposit (id_bank, montant, id_money, nom_monnaie) VALUES ('$id_bank', '$montant', '$id_money', '$nom_monnaie')";
    $conn->exec($sql);
    echo "Dépôt effectuer";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>