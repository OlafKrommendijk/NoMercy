<!--Pagina waar gevraagd wordt hoe de bezoeker zijn spellen speelt-->

<html>
<body>
<link rel="stylesheet" href="../css/footer.css" >
<link rel="stylesheet" href="../css/lijsten.css">

<form id="page-wrapper" method="POST">
    <input type="submit" class="button" name="metWie" value="Alleen">
    <input type="submit" class="button" name="metWie" value="Fysiek samen">
    <input type="submit" class="button" name="metWie" value="Online">

    <input type="submit" class="opnieuw" name="opnieuw" value="Opnieuw Beginnen">
</form>
</body>
</html>

<?php
include_once("../footer.php");
?>