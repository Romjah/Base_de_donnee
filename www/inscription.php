<?php

require_once __DIR__ . '/../src/init.php';

if (isset($_POST["inscription"])){
    if(!empty($_POST['email']) || !empty($_POST['mdp'])){
        $nom= htmlspecialchars($_POST["nom"]);
        $prenom= htmlspecialchars($_POST["prenom"]);
        $email = $_POST["email"];
        $mdp = hash('sha256', $_POST["mdp"]);
        $token= bin2hex(openssl_random_pseudo_bytes(64));
        $insert_user = $bdd ->prepare('INSERT INTO users (nom, email, mdp, token, prenom) VALUES (?, ?, ?, ?, ?)');
        $insert_user->execute (array($email, $mdp, $nom, $prenom, $token));
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="login-form">
<h2 class="text-center">Inscription</h2>
    <form method="POST" action="">
    <div class="form-group">
        <input  type="text" name="nom" placeholder="Nom">
        </div>
        <div class="form-group">
        <input  type="text" name="prenom" placeholder="prenom">
        </div>
        <div class="form-group">
        <input type="text" name="email" placeholder="Email" >
        </div>
        <div class="form-group">
        <input type="password" name="mdp" placeholder="mot de passe">
        </div>
        <div class="form-group">
        <input type="submit" value="inscription" class="btn btn-primary btn-block>Inscript" name="inscription">
        </div>
        </div>
    </form>
</body>
</html>
