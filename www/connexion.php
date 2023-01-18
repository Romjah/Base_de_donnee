<?php
require_once __DIR__ . '/../src/init.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylec.css">
    <title>Connexion</title>
</head>
<body>
 <form method="POST" action="">
        <input type="text" name="email" placeholder="Email" >
        <br>
        <input type="password" name="mdp" placeholder="mot de passe">
        <br>
        <input type="submit" value="connexion" name="connexion">
 </form>
</body>
</html>