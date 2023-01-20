<?php

require_once __DIR__ . '/../src/init.php';

if (isset($_POST["inscription"])){
    if(!empty($_POST['email']) || !empty($_POST['mdp'])){
        $nom= htmlspecialchars($_POST["nom"]);
        $prenom= htmlspecialchars($_POST["prenom"]);
        $email = $_POST["email"];
        $mdp = hash('sha256', $_POST["mdp"]);
        $token= bin2hex(openssl_random_pseudo_bytes(64));
        $insert_user = $bdd ->prepare('INSERT INTO users (email, mdp, nom, prenom, token) VALUES (?, ?, ?, ?, ?)');
        $insert_user->execute (array($email, $mdp, $nom, $prenom, $token));
        echo "L'utilisateur a bien été créé !";
        header("location:connexion.php");

        $check_email = $bdd->prepare('SELECT email FROM users WHERE email = ?');
        $check_email->execute(array($email));
        if($check_email->rowCount() > 0){
            echo "Cet email est déjà relié à un compte";
        } else {
            $insert_user = $bdd ->prepare('INSERT INTO users (email, mdp, nom, prenom, token) VALUES (?, ?, ?, ?, ?)');
            $insert_user->execute (array($email, $mdp, $nom, $prenom, $token));
            echo "L'utilisateur a bien été créé !";
            header("location:connexion.php");
        }
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
    <link rel="stylesheet" href="stylec.css">
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
    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {        
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</body>
</html>
