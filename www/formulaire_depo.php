<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylec.css">
    <title>Page perso</title>
</head>
<body>
<form>
    <label for="currency">Type d'argent :</label>
    <select id="currency" name="currency">
    <option value="EUR">euros</option>
    <option value="YUA">yuan</option>
    <option value="BIT">bitcoin</option>
    <option value="BER">berrys</option>
    </select>
    <br><br>
    <label for="amount">Montant à déposer :</label>
    <input type="number" id="amount" name="amount" min="0">
    <br><br>
    <input type="submit" value="Déposer">
</form> 
</body>
</html>