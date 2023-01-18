<?php 
    require_once __DIR__ . '../../src/config.php'; // On inclu la connexion à la bdd
    echo 'testoooo';

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype'])){
        // Patch XSS
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        // On vérifie si l'users existe
        $check = $bdd->prepare('SELECT email FROM users WHERE email = ?'); 
        $check->execute(array($email));
        $row = $check->rowCount();

        $email = strtolower($email); 
        
        // Si la requete renvoie un 0 alors l'users n'existe pas 
        if($row == 0){ 
            if(strlen($nom) <= 100 AND strlen($prenom) <= 100){ // On verifie que la longueur du nom$nom <= 100
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($password === $password_retype){ // si les deux mdp saisis sont bon

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                            
                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO users( email, password, nom, prenom) VALUES( :email, :password, :nom, :prenom)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'email' => $email,
                                'password' => $password,
                            ));
                            // On redirige avec le message de succès
                            header('Location:inscription.php?reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                    }else{ header('Location: inscription.php?reg_err=email'); die();}
                }else{ header('Location: inscription.php?reg_err=email_length'); die();}
            }else{ header('Location: inscription.php?reg_err=nom_length'); die();}
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }else{
        echo'AAAAa';
    }