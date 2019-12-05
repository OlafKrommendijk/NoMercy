<!--Zorgt voor de database connectie-->

<?php
//defineert de log in voor de database.
DEFINE("DB_USER", "root");
DEFINE("DB_PASS", "");

//Met een try catch block worden zo geheten exceptions of uitzonderingen opgevangen en wordt gezocht naar een catch met een code die de exception kan uitvoeren, als deze niet gevonden kan worden wordt hiervoor de global exception handler voor gebruikt.

//probeert op de database in te loggen.
try {
    $db = new PDO("mysql:host=localhost;dbname=nomercy",DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
    echo $e->getMessage();
}
?>