<?php
    
        $id_expediteur = $_GET["id_expediteur"];
        $id_destinataire= $_GET["id_destinataire"];
        $montant = $_GET["montant"];
        $monnaie = $_GET["monnaie"];
        $objets_transaction = $_GET["objets_transaction"];
    

$host = "localhost";
$user = "root";
$pass = "root";
$nbdd = "Banque";

try {
    $conn = new PDO("mysql:host=$host;dbname=$nbdd", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO transactions (id_expediteur, id_destinataire, montant, monnaie, objets_transaction) VALUES ('$id_expediteur', '$id_destinataire', '$montant', '$monnaie', '$objets_transaction')";
    $conn->exec($sql);
    echo "Transaction effectuer";
} catch(PDOException $e) {
    echo "Il n'éxiste pas expéditeur ou de destinataire avec cet identifiant";
}

$conn = null;
?>