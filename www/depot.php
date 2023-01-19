<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'depot';
if (isset($_POST['depot'])){
    $somme = $_POST['somme'];
    $id_user = $_POST['id_user'];
if ($somme != '') {
        $req = $db->prepare('INSERT INTO depot(id_user,somme) VALUES(?, ?)');
        $req->execute([$id_user, $somme]);

            $message = 'Votre dépôt a été effectué avec succès.';
        } else {
            $message = 'Le solde de votre compte est insuffisant pour effectuer ce dépôt.';
        }
    } else {
        $message = 'Veuillez entrer une somme valide.';
    }
?>

<body>
<link rel="stylesheet" href="../../src/style.css">
    <div>
        <h1>Dépôt</h1>
    </div>
    <div>
        <form action="depot.php" method="post">
            <div>
                <label for="id_user">id_user</label>
                <input type="int" name="id_user" id="id_user">
            </div>
            <div>
                <label for="somme">somme</label>
                <input type="int" name="somme" id="somme">
            </div>
                <button type="submit" name="depot">Déposer</button>
            </div>
        </form>
    </div>
</body>

</html>