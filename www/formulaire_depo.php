<?php

    try {
        $user = "root";
        $pass = "root";
        $bdd = new PDO('mysql:host=localhost;dbname=tuto_php', $user, $pass);

        $req = 'SELECT * from user';

        foreach($bdd->query($req) as $row) {
            affichl($row);
        }

        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

    function affichl($row) {
        echo 'prenom : ' . $row['prenom'];
        echo '<br/>';
        echo 'email : ' . $row['email'];
        echo '<br/>';
    }

?>