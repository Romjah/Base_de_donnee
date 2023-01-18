<?php
require_once __DIR__ . '/../src/init.php';
if(isset($_POST['connexion'])){
    if(!empty($_POST['email']) && !empty($_POST['mdp'])){
        $email = $_POST["email"];
        $mdp = hash('sha256', $_POST["mdp"]);
    
        $reccupUser = $bdd->prepare('SELECT * FROM user WHERE email= ? and mdp= ?');
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