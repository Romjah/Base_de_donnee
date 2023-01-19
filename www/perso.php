<?php
    
    $nom = $_GET["nom"];
    $prenom = $_GET["prenom"];
    $email = $_GET["email"];
    

$host = "localhost";
$user = "root";
$pass = "root";
$nbdd = "tuto_php";

try {
  $conn = new PDO("mysql:host=$host;dbname=$nbdd", $user, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO user (nom, prenom, email) VALUES ('$nom', '$prenom', '$email')";
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>