<html>
<head>
    <meta charset="UTF-8">
    <title>Page perso</title>
</head>
<body>
    <form method="get" action="deposition.php">
    <p>
        <label for="amount">Identifiant de la banque:</label>
        <input type="text" name="id_bank" />
        <br><br>
        <label for="amount">Montant à déposer:</label>
        <input type="text" name="montant" />
        <br><br>
        <label for="amount">Identifiant de la monnaie:</label>
        <input type="text" name="id_money" />
        <br><br>
        <label for="amount">Type de monnaie:</label>
        <input type="text" name="nom_monnaie" />
        <br><br>
        <input type="submit" value="Demande de dépôt" />
    </p>
    </form> 
    <form method="get" action="connecter.php">
    <p>
        <input type="submit" value="retour" />
    </p>
    </form>
</body>
</html>