<?php
if (isset($_POST['toevoegen_studenten'])) {
    // echo "<pre>";
    // print_r($_POST);
    // echo "<pre>";
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $leeftijd = $_POST['leeftijd'];
    
    
    if ($voornaam == "" || empty($voornaam)|| $achternaam == "" || empty($achternaam)|| $leeftijd == "" || empty($leeftijd)){
        $message = "";
        if($voornaam == "" || empty($voornaam)){
            $message .= "Vul een voornaam in! <br>"; 
        }
        if ($achternaam == "" || empty($achternaam)) {
            $message .= "Achternaam invullen! <br>";
        }
        if ($leeftijd == "" || empty($leeftijd)) {
            $message .= "Leeftijd invullen! <br>";
        }
        header("location:index.php?message= $message ");
    }
} 