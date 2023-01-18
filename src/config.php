<?php 

    try 
    {
        $bdd = new PDO("mysql:host=localhost;dbname=Banque;charset=utf8;port=8888", "root", "root");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }

