<?php 
require_once __DIR__ . '/../src/init.php';
if (isset($_GET['id']) && !empty($_GET['id'])){
    $getid= $_GET['id'];
    $recupuser= $dbb->prepare('SELECT * FROM users WHERE id = ?');
    $recupuser->execute(array($getid));
    if ($recupuser->rowCount() > 0){
        $banniruser = $bdd->prepare('DELETE FROM user WHERE id=?'); 
        $banniruser->execute(array($getid));
        header ('Location: membres.php');
    } else{
        echo "aucun membres n'a été trouvé";
    }
}else {
    echo "l'identifiant n'a pas été récuperer";
}
?>
