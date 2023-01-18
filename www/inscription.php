<?php

require_once __DIR__ . '/../src/init.php';

if (isset($_POST["inscription"])){
    if(!empty($_POST['email']) || !empty($_POST['mdp'])){
        $nom= htmlspecialchars($_POST["nom"]);
        $email = $_POST["email"];
        $mdp = hash('sha256', $_POST["mdp"]);
        $token= bin2hex(openssl_random_pseudo_bytes(64));
        $insert_user = $bdd ->prepare('INSERT INTO user (nom, email, mdp, token) VALUES (?, ?, ?, ?)');
        $insert_user->execute (array($nom, $email, $mdp, $token));
        echo "L'utilisateur a bien été créé !";
        header("location:connexion.php");

    } else{
        echo "les champs ne sont pas remplis";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>INSCRIPTION</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="">
        <input  type="text" name="nom">
        <input type="text" name="email">
        <br>
        <input type="password" name="mdp">
        <br>
        <input type="submit" value="sinscrire" name="inscription">

    </form>
</body>
</html>
