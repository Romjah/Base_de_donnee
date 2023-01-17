<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>INSCRIPTION</title>
</head>
<body>
    <?php
     $user = "root";
     $pass = "root";
     $dbh = new PDO('mysql:host=localhost;dbname=Banque', $user, $pass);

    <nav id="tt_les_champ">
        
    <div id="champ_id">
        <label for="id">id :</label>
        <input type="text" id="mail" name="user_id">
    </div>

    <div id="champ_password">
        <label for="password">password:</label>
        <input type="password" id="pass" name="user_password">
    </div>

    <div id="bouton_inscription">
        <input type="button" value="s'inscrire">
    </div>
</nav>

</form>
</body>
</html>
