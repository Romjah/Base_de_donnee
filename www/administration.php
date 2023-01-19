<?php
require_once __DIR__ . '/../src/init.php';
if (!$_SESSION['mdp']){
    header ('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>page d'administration</title>
</head>
<body>
    <a href="membres.php">afficher tous les membres</a>
</body>
</html>