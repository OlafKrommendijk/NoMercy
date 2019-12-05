<?php
include('../header.php');

//checked of de gebruiker is ingelogd.

$tabelAnswers = 'antwoorden';
if (isset($_SESSION["ID"]) && $_SESSION["STATUS"] === 1) {

    if (isset($_POST["form"])) {
        $selected = "";
        $selected = $_POST["form"];

        //checked welke select er word gekozen en zoekt bij de select de juiste gegevens uit de database en laat deze zien.
        if ($selected === "alle geregistreerden") {

            //selecteert alle gebruikers die in de database staan
            $gebruikers = "SELECT * FROM gebruiker";
            $stmt = $db->prepare($gebruikers);
            $stmt->execute(array());
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION["result"] = $result;

        } elseif ($selected === "Kaartspellen" || $selected === "Strategische bordspellen" || $selected === "Fantasy bordspellen" || $selected === "Klassieke gezelschapsspellen" || $selected === "Sportgames" || $selected === "Adventuregames" || $selected === "Wargames" || $selected === "Strategische games") {
            //Selecteert alle namen van gebruikers per categorie
            $gebruikers = "SELECT naam, antwoorden.waarde_3 AS 'Categorie' FROM gebruiker INNER JOIN $tabelAnswers WHERE antwoorden.gebruiker_id = gebruiker.id AND antwoorden.waarde_3 = '$selected'";
            $stmt = $db->prepare($gebruikers);
            $stmt->execute(array());
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION["result"] = $result;

        } elseif ($selected === "Bordspellen" || $selected === "Computer Games") {
            //Selecteert alle namen van gebruikers per computer of bord
            $gebruikers = "SELECT naam, antwoorden.waarde_2 AS 'Bord/Computer' FROM gebruiker INNER JOIN antwoorden WHERE antwoorden.gebruiker_id = gebruiker.id AND antwoorden.waarde_2 = '$selected'";
            $stmt = $db->prepare($gebruikers);
            $stmt->execute(array());
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION["result"] = $result;

            //Selecteert alle categorien.
        } elseif ($selected === "Alle Categorien") {
            $gebruikers = "SELECT DISTINCT waarde_3 AS 'Categoriën' FROM antwoorden";
            $stmt = $db->prepare($gebruikers);
            $stmt->execute(array());
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION["result"] = $result;

            //Selecteert hoe de gebruiker speelt.
        } elseif ($selected === 'Online' || $selected === 'Fysiek samen' || $selected === "Alleen") {
            //Selecteerd alle namen van gebruikers per manier van spelen
            $gebruikers = "SELECT naam, antwoorden.waarde_1 AS 'Soort' FROM gebruiker INNER JOIN antwoorden WHERE antwoorden.gebruiker_id = gebruiker.id AND antwoorden.waarde_1 = '$selected'";
            $stmt = $db->prepare($gebruikers);
            $stmt->execute(array());
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION["result"] = $result;

            //Geeft een echo als er geen waarde is geselecteerd.
        } elseif ($selected === "") {
            echo('<h1>"Geen waarde geselecteerd"</h1>');

        } else {
            $gebruikers = "SELECT * FROM gebruiker";
            $stmt = $db->prepare($gebruikers);
            $stmt->execute(array());
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION["result"] = $result;
        }
    }


    include('lijstenGenereren.php');


} else {
    echo "<script>alert('U moet ingelogd zijn om deze pagina te bekijken.'); location.href='inloggen.php';</script>";
}
?>
