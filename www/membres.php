<?php
require_once __DIR__ . '/../src/init.php';
if (!$_SESSION['mdp']){
    header ('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    $recupusers = $bdd->query('SELECT * from users');
    while($userr = $recupusers->fetch()){
        ?>
       <p><?= $userr['nom']; ?> <?= $userr['prenom']; ?> <?= $userr['email']; ?> </p>
        <?php
    }
    ?>
    ?>
</body>
</html>
