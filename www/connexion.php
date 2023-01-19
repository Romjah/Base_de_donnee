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
        
        <form>
            <h2 class="text-center">Connexion</h2>       
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
            <input type="submit" value="connexion" name="connexion" class="btn btn-primary btn-block">
            </div>   
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