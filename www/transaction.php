<html>
<head>
    <meta charset="UTF-8">
    <title>Page perso</title>
</head>
<body>
 <form method="get" action="transaction_page.php">
    <p>
        <label for="dona">ID expediteur</label>
        <input type="number" name="id_expediteur" />
        <br>
        <label for="recev">ID destinataire</label>
        <input type="number" name="id_destinataire" />
        <br>
        <label for="somme">somme</label>
        <input type="number" name="montant" />
        <br>
        <label for="monnaie">type de monnaie</label>
        <select id="currency" name="monnaie">
        <option value="BER">berry</option>
        <option value="EUR">euro</option>
        <option value="YUA">yuan</option>
        <option value="BIT">bitcoin</option>
        </select>
        <br>
        <label for="monnaie">type de payement</label>
        <select id="currency" name="objets_transaction">
        <option value="CB">cb</option>
        <option value="CHE">chèque</option>
        <option value="VIR">virement</option>
        </select>
        <br>
        <input type="submit" value="Transférer" />
    </p>
 </form>
</body>
</html>
    </div>
</body>

</html>