<?php 
    require_once __DIR__ . '../../src/init.php';
    require_once __DIR__ . '../../src/db.php'; // On inclu la connexion à la db
    echo 'testoooo</br>';

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype'])){
        // Patch XSS
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        // On vérifie si l'users existe
        $check = $db->prepare('SELECT email FROM users WHERE email = ?'); 
        $check->execute(array($email));
        $row = $check->rowCount();

        $email = strtolower($email); 
        echo 'Entrée de Boucle! 1</br>';
        // Si la requete renvoie un 0 alors l'users n'existe pas 
        if($row == 0){ 
            echo 'Entrée de Boucle! 2</br>';
            if(strlen($nom) <= 100 AND strlen($prenom) <= 100){ // On verifie que la longueur du nom$nom <= 100
                echo 'Entrée de Boucle! 3</br>';
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    echo 'Entrée de Boucle! 4</br>';
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        echo 'Entrée de Boucle! 5</br>';
                        if($password === $password_retype){ // si les deux mdp saisis sont bon
                            echo 'Entrée de Boucle! 6</br>';

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                            
                            // On stock l'adresse IP
                            $last_ip = $_SERVER['REMOTE_ADDR']; 

                            // On insère dans la base de données      (ATTENTION PROBLÈME DÉTECTÉ: "'role' doesn't have a default value" NI DANS LA TABLE USERS NI DANS LA TABLE GRADE)
                            $insert = $db->prepare('INSERT INTO users( email, password, nom, prenom, last_ip, token) VALUES( :email, :password, :nom, :prenom, :last_ip, :token)');
                            echo 'Entrée de execute(array()) LLLLOOOOOOLLLLL</br>';
                            $insert->execute(array(                     //
                                'email' => $email,                      //
                                'password' => $password,                // ENDROIT DU PROBLÈME
                                'nom' => $nom,                          //
                                'prenom' => $prenom,
                                'last_ip' => $last_ip,
                                'token' => bin2hex(openssl_random_pseudo_bytes(64))

                            ));
                            echo 'Sortie de execute(array() :)</br>';
                            // On redirige avec le message de succès
                            header('Location:inscription.php?reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();echo'Sortie de Boucle! 6</br>';}
                    }else{ header('Location: inscription.php?reg_err=email'); die();echo'Sortie de Boucle! 5</br>';}
                }else{ header('Location: inscription.php?reg_err=email_length'); die();echo'Sortie de Boucle! 4</br>';}
            }else{ header('Location: inscription.php?reg_err=nom_length'); die();echo'Sortie de Boucle! 3</br>';}
        }else{ header('Location: inscription.php?reg_err=already'); die();echo'Sortie de Boucle! 2</br>';}
    }else{
        echo'Sortie de Boucle! 1</br>';
    }