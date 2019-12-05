<!--Pagina waar een bezoeker zich kan registreren-->

<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" href="../css/registereren.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>

<div id="page-wrapper">
    <form name="aanmelden" method="POST" enctype="multipart/form-data" action=" ">
        <input required type="text" name="naam" placeholder="Naam" />
        <input required type="text" name="adres" placeholder="Adres"/>
        <input required type="text" name="postcode" placeholder="Postcode"/>
        <input required type="email" name="email" placeholder="bij@voorbeeld.com"  />
        <input type="submit" name="submit" id="submit" value=" Inloggen " href="" />
    </form>
</div>

<?php
include_once("../footer.php");
?>

</body>
</html>


