<?php

require_once __DIR__ . '/../src/init.php';
$page_title = 'Inscription';
require_once __DIR__ . '/actions/inscriptionform.php';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
?>

<body>
<div class="login-form">
<h2 class="text-center">Inscription</h2>
    <form method="get" action="inscriptionform.php">
    <div class="form-group">
        <input  type="text" name="nom" placeholder="Nom">
        </div>
        <div class="form-group">
        <input  type="text" name="prenom" placeholder="prenom">
        </div>
        <div class="form-group">
        <input type="text" name="email" placeholder="Email" >
        </div>
        <div class="form-group">
        <input type="password" name="mdp" placeholder="mot de passe">
        </div>
        <div class="form-group">
        <input type="submit" value="inscription" class="btn btn-primary btn-block>Inscript" name="inscription">
        </div>
        </div>
    </form>
    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {        
            font-size: 15px;
            font-weight: bold;
        }
</style>
</body>
</html>
