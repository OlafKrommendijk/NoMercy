<!--Pagina waar gevraagd wordt hoe de bezoeker zijn spellen speelt-->

<html>
<body>
<link rel="stylesheet" href="../css/footer.css" >
<link rel="stylesheet" href="../css/lijsten.css">

<form id="page-wrapper" method="POST">
    <input type="submit" class="button" name="spellen" value="Kaartspellen">
    <input type="submit" class="button" name="spellen" value="Strategische bordspellen">
    <input type="submit" class="button" name="spellen" value="Fantasy bordspellen">
    <input type="submit" class="button" name="spellen" value="Klassieke gezelschapsspellen">

    <input type="submit" class="opnieuw" name="opnieuw" value="Opnieuw Beginnen">
</form>
</body>
</html>

<?php
include_once("../footer.php");
?>