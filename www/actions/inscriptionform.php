<?php


if (isset($_POST['inscription'])) {
    if (!empty($_POST['email']) || !empty($_POST['mdp'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = $_POST['email'];
        $mdp = hash('sha256', $_POST['mdp']);
        $token = bin2hex(openssl_random_pseudo_bytes(64));
        $insert_user = $bdd->prepare(
            'INSERT INTO users (email, mdp, nom, prenom, token) VALUES (?, ?, ?, ?, ?)'
        );
        $insert_user->execute([$email, $mdp, $nom, $prenom, $token]);
        echo "L'utilisateur a bien été créé !";
        header('location:connexion.php');

        $check_email = $bdd->prepare('SELECT email FROM users WHERE email = ?');
        $check_email->execute([$email]);
        if ($check_email->rowCount() > 0) {
            echo 'Cet email est déjà relié à un compte';
        } else {
            $insert_user = $dbManager->insert(
                'INSERT INTO users (email, mdp, nom, prenom, token) VALUES (?, ?, ?, ?, ?)',
                [$email, $mdp, $nom, $prenom, $token]
            );
            echo "L'utilisateur a bien été créé !";
            header('location:connexion.php');
        }
    } else {
        echo 'les champs ne sont pas remplis';
    }
}

?>