<?php

$user = 'root';
$pass = 'root';

try {
    $db = new PDO ('mysql:host=localhost;dbname=Banque', $user, $pass);
    foreach ($db->query('SELECT * FROM deposits') as $row) {
        print_r($row);
    }
} catch (PDOException $e) {
    print "Erreur : " . $e->getMessage() . "<br/>";
    die;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylec.css">
    <title>Page perso</title>
</head>
<body>
<form>
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