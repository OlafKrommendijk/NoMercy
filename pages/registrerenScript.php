<?php

include("../header.php");

//haalt alle data uit de form als er op submit is gedrukt
if (isset($_POST["submit"])) {
    $naam = htmlspecialchars($_POST["naam"]);
    $adres = htmlspecialchars($_POST["adres"]);
    $postcode = htmlspecialchars($_POST["postcode"]);
    $zipcode = htmlspecialchars($_POST["adres"]);
    $email = htmlspecialchars($_POST["email"]);


//checked of er een echt email is ingevuld.
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $checkedEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        $sql = "SELECT email FROM gebruiker WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $response = null;
        $_SESSION["email"] = $email;

//als de email al gebruikt is krijgt de gebruiker een melding en wordt hij weer doorgestuurd naar de home pagina. Als dit niet het geval is krijgt de gebruiker de eerse vragenlijst voor zich
        if ($result > 0) {
            echo "<script>location.href='../index.php';
            setTimeout([alert('Het ingevulde emailadres is al in gebruikt')] ,3000);
            </script>";
        } else if (isset($_POST["submit"])) {
            $query = "INSERT INTO gebruiker (naam, adres, postcode, email)  VALUES (':nsme', '$adres', '$postcode', '$email')";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'name' => $naam,

            ]);
            include('metWie.php');
        }

    } else {
        echo "<script>location.href='index.php';</script>";
    }

    //zet het antwoord van de gebruiker in een waarde een laat de nieuwe vraag zien.
    }else if (isset($_POST["metWie"])) {
                $waarde_1 = $_POST['metWie'];
                $_SESSION["waarde_1"] = $waarde_1;

                include('bordOfPc.php');

                $email =  $_SESSION["email"];

                $id = "SELECT id FROM gebruiker WHERE email = '$email'";
                $stmt = $db->prepare($id);
                $stmt->execute(array());
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION["gebruikerId"] = $result;

    //zet het antwoord van de gebruiker in een waarde. Checked ook welke vraag is ingevuld is en laat de juiste vraag zien.
    }else if (isset($_POST["bordOfPC"])) {
                $waarde_2 = $_POST['bordOfPC'];
                $_SESSION["waarde_2"] = $waarde_2;
                if ($waarde_2 === "Bordspellen") {
                    include('bordspellen.php');
                } else if ($waarde_2 === "Computer Games") {
                    include('computerGames.php');
                }

    }else if (isset($_POST["spellen"])) {
        include('afgerond.php');
        $id = $_SESSION["gebruikerId"];
        $id = implode($id);

//Pushed de ingevulde antwoorden van de gebruiker naar de database.
        $waarde_1 = $_SESSION["waarde_1"];
        $waarde_2 = $_SESSION["waarde_2"];
        $waarde_3 = $_POST["spellen"];
        $query = "INSERT INTO antwoorden (gebruiker_id, waarde_1, waarde_2, waarde_3)  VALUES ('$id', '$waarde_1', '$waarde_2', '$waarde_3')";
        $stmt = $db->prepare($query);
        $stmt->execute(array());

//als de gebruiker op opnieuw klikt worden zijn oude waardes leeg gemaakt en hij weer doorgestuurd naar de eerste vraag.
     }else if (isset($_POST["opnieuw"])) {
        $LegeWaarde = "";
        $_SESSION["waarde_1"] = $LegeWaarde;
        $_SESSION["waarde_2"] = $LegeWaarde;
        $_SESSION["waarde_3"] = $LegeWaarde;
        include('metWie.php');
    }

    else {
        include('registreren.php');
    }

?>
