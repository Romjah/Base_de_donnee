<?php

require_once __DIR__ . '/../src/init.php';

if (isset($_POST["inscription"])){
    if(!empty($_POST['email']) || !empty($_POST['mdp'])){
        $email = htmlspecialchars($_POST["email"]);
        $mdp = hash('sha256', $_POST["mdp"]);
        $nom= htmlspecialchars($_POST["nom"]);
        $insert_user = $bdd ->prepare('INSERT INTO user (email, mdp, nom) VALUES (?, ?, ?)');
        $insert_user->execute (array($email, $mdp, $nom));
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
