<!--Pagina die bezoekers als eerste zie als ze op de website komen.-->

<?php
    include_once("header.php");
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>

<div id="page-wrapper">
    <h2>Show No Mercy!</h2>

    <p>Welkom op de website van Show No Mercy, op deze website vragen wij u om een vragenlijst in te vullen.</p>

        <input type="button" class="inloggen" value=" Inloggen " onclick="location.href='pages/inloggen.php'" />
        <input type="button" class="registreren" value=" Registreren " onclick="location.href = 'pages/registrerenScript.php'" />
</div>

<!--voegt de footer met style toe aan het bestand-->
<?php
include_once("footer.php");
?>
</body>
</html>

