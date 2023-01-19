<?php
require_once __DIR__ . '/../src/init.php';
if(isset($_POST['connexion'])){
    $emailAdmin="admin@admin.com";
    $mdpAdmin="ac9689e2272427085e35b9d3e3e8bed88cb3434828b43b86fc0596cad4c6e270";

    if(!empty($_POST['email']) && !empty($_POST['mdp'])){
        $email = $_POST["email"];
        $mdp = hash('sha256', $_POST["mdp"]);
        
        if ($emailAdmin === $email && $mdpAdmin === $mdp){
            $_SESSION['mdp'] = $mdp;
        header ('Location: administration.php');
        }
    
        $reccupUser = $bdd->prepare('SELECT * FROM users WHERE email= ? and mdp= ?');
        $reccupUser->execute(array($email, $mdp));

        if($reccupUser->rowCount() > 0){
            $_SESSION['email'] =$email;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id_user'] = $reccupUser->fetch()['id_user'];
            header("location:index.php");

        } else{
            echo "votre email ou mot de passe est incorrect";
        }

    }else{
        echo "veuillez completer les champs";
    }
    }
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
        <input type="text" name="email" autocomplete="off" placeholder="Email" >
        <br>
        <input type="password" name="mdp" autocomplete="off" placeholder="mot de passe">
        <br>
        <input type="submit" value="connexion" name="connexion">
 </form>
</body>
</html>