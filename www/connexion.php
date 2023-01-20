<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Connexion</title>
        </head>
        <body>
        
        <div class="login-form">
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
                    die();
                    }
                
                    $reccupUser = $bdd->prepare('SELECT * FROM users WHERE email= ? and mdp= ?');
                    $reccupUser->execute(array($email, $mdp));
            
                    if($reccupUser->rowCount() > 0){
                        $_SESSION['email'] =$email;
                        $_SESSION['mdp'] = $mdp;
                        $_SESSION['id_user'] = $reccupUser->fetch()['id_user'];
                        header("location:connecter.php");
                        die();
                    } else{
                        echo "votre email ou mot de passe est incorrect";
                    }
            
                }else{
                    echo "veuillez completer les champs";
                }
            }
        ?>
        <form method="POST" action="">
            <input type="text" name="email" autocomplete="off" placeholder="Email" >
            <br>
            <input type="password" name="mdp" autocomplete="off" placeholder="mot de passe">
            <br>
            <input type="submit" value="connexion" name="connexion">
        </form>
        <p class="text-center"><a href="inscription.php">Inscription</a></p>
        </div>
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
