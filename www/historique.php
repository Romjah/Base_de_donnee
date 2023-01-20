<?php

    try {
        $user = "root";
        $pass = "root";
        $bdd = new PDO('mysql:host=localhost;dbname=Banque', $user, $pass);

        $req = 'SELECT * from transactions';

        foreach($bdd->query($req) as $row) {
            affichl($row);
        }

        $bdd = null;
    } catch (PDOException $e) {
        print "Aucune transaction éffectuer";
        die();
    }

    function affichl($row) {
        echo 'montant : ' . $row['montant'];
        echo '<br/>';
    }

?>