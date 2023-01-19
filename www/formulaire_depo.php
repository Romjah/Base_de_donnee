<?php

    try {
        $user = "root";
        $pass = "root";
        $bdd = new PDO('mysql:host=localhost;dbname=Banque', $user, $pass);

        $req = 'SELECT * from users';

        foreach($bdd->query($req) as $row) {
            affichl($row);
        }

        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

    function affichl($row) {
        echo 'nom : ' . $row['prenom'];
        echo '<br/>';
        echo 'email : ' . $row['email'];
        echo '<br/>';
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page perso</title>
</head>
<body>
<form method="get" action="perso.php">
    <label for="currency">Type d'argent :</label>
    <select id="currency" name="currency">
    <option value="EUR">euros</option>
    <option value="YUA">yuan</option>
    <option value="BIT">bitcoin</option>
    <option value="BER">berrys</option>
    </select>
    <br><br>
    <label for="amount">Montant à déposer :</label>
    <input type="number" id="amount" name="amount" min="0">
    <br><br>
    <input type="submit" value="Déposer">
</form> 
</body>
</html>