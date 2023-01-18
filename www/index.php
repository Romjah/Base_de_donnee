<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

if($role == "banni"){
    die("vous n'avez pas accès à cette page !")
}

$page_title = 'Home page';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

?>
<link rel="stylesheet" href="style.css">
<body>

<div>
    <h1>Home page</h1>
    <a href="../inscription.php">page d'inscription</a>
    <a href="../connexion.php">page de connexion</a>
</div>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>
