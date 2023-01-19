<?php
    
    $role = $_GET["role"];
    $prenom = $_GET["prenom"];
    $nom = $_GET["nom"];
    $email = $°GET["email"];
    $password = $_GET["password"];
    $id_transaction = $_GET["id_transaction"];
    $token = $_GET["token"];

$host = "localhost";
$user = "root";
$pass = "root";
$nbdd = "Banque";

try {
  $conn = new PDO("mysql:host=localhost;dbname=Banque", $name, $pass);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO users (role, email, password, id_transaction, nom, prenom, token)
  VALUES ('$role', '$email', '$password', '$id_transaction', '$nom', '$prenom', '$token')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>