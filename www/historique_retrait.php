<?php

    try {
        $user = "root";
        $pass = "root";
        $bdd = new PDO('mysql:host=localhost;dbname=Banque', $user, $pass);

        $req = 'SELECT * from withdrawals';

        foreach($bdd->query($req) as $row) {
            affichl($row);
        }

        $bdd = null;
    } catch (PDOException $e) {
        print "Aucune retrait éffectuer";
        die();
    }

    function affichl($row) {
        echo 'montant : ' . $row['montant'];
        echo '<br/>';
    }

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Page perso</title>
</head>
<body>
 <form method="get" action="connecter.php">
    <p>
        <input type="submit" value="retour" />
    </p>
 </form>
</body>
</html>