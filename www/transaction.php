<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'transaction';

if (isset($_POST['transaction'])){
    $somme = $_POST['somme'];
    $id_donator = $_POST['id_donator'];
    $id_receiver = $_POST['id_receiver'];
if ($somme != '') {
        $req = $db->prepare('INSERT INTO transaction(id_donator, id_receiver, somme) VALUES(?, ?, ?)');
        $req->execute([$id_donator, $id_receiver, $somme]);

            $message = 'Votre transaction a été effectuée avec succès.';
        } else {
            $message = 'Le solde de votre compte est insuffisant pour effectuer cette transaction.';
        }
    } else {
        $message = 'Veuillez entrer une somme valide.';
    }
?>

<body>
    <div>
        <h1>Transaction</h1>
    </div>
    <div>
        <form action="transaction.php" method="post">
        <div>
                <label for="dona">ID donateur</label>
                <input type="int" name="id_donator" id="id_donator">
            </div>
            <div>
                <label for="recev">ID receveur</label>
                <input type="int" name="id_receiver" id="id_receiver">
            </div>
            <div>
                <label for="prenom">somme</label>
                <input type="int" name="somme" id="somme">
            </div>
                <button type="submit" name="transaction">Transférer</button>
            </div>
        </form>
    </div>
</body>

</html>