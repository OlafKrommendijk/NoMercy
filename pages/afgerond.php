<!--De pagina die de bezoeker ziet als hij alles heeft ingevuld, hij wordt na 3 seconden weer doorgestuurd naar de homepage-->

<html>
<body>
<head>
    <link rel="stylesheet" href="../css/footer.css" >
    <link rel="stylesheet" href="../css/lijsten.css">
<!--    Stuurt de bezoeker door naar de home pagina-->
    <meta http-equiv="refresh" content="3;url=http://localhost/NoMercy/">
</head>

<form id="page-wrapper" method="POST">
    <h2> Bedankt voor het invullen van de vragenlijst!</h2>
</form>
</body>
</html>

<?php
include_once("../footer.php");
?>
