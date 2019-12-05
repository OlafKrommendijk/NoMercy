<?php
// Turn off all error reporting
error_reporting(0);
error_reporting( error_reporting() & ~E_NOTICE )
?>

<html>
<head>
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/uitvoer.css">
    <a class="uitloggen" href="uitloggen.php">uitloggen</a>
</head>
<div class="wrapper">
    <div class="page-wrapper">
        <form class="lijstenHeader" method="POST" action="lijsten.php">

            <select style="height: 63px;" id="selectLijst" name="form"
                    onchange="this.form.submit();">
                <option>Selecteer uw input</option>
                <optgroup label="Geregistreerden">
                    <option value="alle geregistreerden">Alle Geregistreerden</option>
                </optgroup>
                <optgroup label="Soorten">
                    <option value="Alleen">Meestal alleen spelen</option>
                    <option value="Fysiek samen">Samen Fysiek</option>
                    <option value="Online">Samen Online</option>
                </optgroup>
                <optgroup label="Bord of Games">
                    <option value="Bordspellen">Bordspellen</option>
                    <option value="Computer Games">Games</option>
                </optgroup>
                <optgroup label="Categorieën">
                    <option value="Alle Categorien">Alle Categoriën</option>
                    <option value="Kaartspellen">Kaartspellen</option>
                    <option value="Strategische bordspellen">Strategische Bordspellen</option>
                    <option value="Fantasy bordspellen">Fantasy Bordspellen</option>
                    <option value="Klassieke gezelschapsspellen">Klassieke Gezelschapspellen</option>
                    <option value="Sportgames">Sport Games</option>
                    <option value="Adventuregames">Adventure Games</option>
                    <option value="Wargames">Wargames</option>
                    <option value="Strategische games">Strategische Games</option>
                </optgroup>
            </select>
        </form>
    </div>

    <div class="download-button">
        <button class="download-button1" style="height: 63px;" onclick="exportTableToCSV('Lijst.csv')">Download CSV
        </button>
    </div>
</div>
<body>
<?php

//Maakt de tabel met de data die hij uit de database krijgt.
if (count($_SESSION['result']) > 0): ?>
    <div class="table">
        <table class="lijsten">
            <thead>
            <tr>
                <th><?php echo implode('</th><th>', array_keys(current($result))); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row): array_map('htmlentities', $row); ?>
                <tr>
                    <td><?php echo implode('</td><td>', $row); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php

    endif;

include_once("../footer.php");

?>
<script type="text/javascript" src="csv.js"></script>
</body>
</html>
