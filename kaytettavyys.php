<?php
session_start();
require "header.php"; 
require "connect.php";

if(!isset($_SESSION['email'])){
  header("Location: kirjautuminen.php");
  exit;
}

if (isset($_POST['kaytettavissa'])) {
    // Button has been clicked, update the database
    $kaytettavissa = $_POST['kaytettavissa'];
    $tyontekijasposti = $_SESSION['email'];
  
    $haku = "UPDATE tyontekija SET kaytettavyysID = 1 WHERE tyontekijasposti = :tyontekijasposti";
    $komento = $yhteys->prepare($haku);
    $komento->execute([
      'tyontekijasposti' => $tyontekijasposti
    ]);
        $button_class = 'btn-success'; // Update the button class for the success state
    } else {
        $button_class = 'btn-light'; // Use default button class for the initial state
    }
    
    $_SESSION['button_class'] = $button_class; // Store the button class in a session variable
    
    header("Location: tyontekijaApp.php");
    
// Check if the keikalla form has been submitted
if(isset($_POST['keikalla'])) {
    $keikalla = $_POST['keikalla'];
    $tyontekijasposti = $_SESSION['email'];

    // Update the tyontekija table
    $haku = "UPDATE tyontekija SET kaytettavyysID = 2 WHERE tyontekijasposti = :tyontekijasposti";
    $komento = $yhteys->prepare($haku);
    $komento->execute([
    'tyontekijasposti' => $tyontekijasposti
    ]);
        $button_class2 = 'btn-warning'; // Update the button class for the success state
    } else {
        $button_class2 = 'btn-light'; // Use default button class for the initial state
    }
    
    $_SESSION['button_class2'] = $button_class2; // Store the button class in a session variable
    header("Location: tyontekijaApp.php");

// Check if the tauolla form has been submitted
if(isset($_POST['tauolla'])) {
    $tauolla = $_POST['tauolla'];
    $tyontekijasposti = $_SESSION['email'];

    // Update the tyontekija table
    $haku = "UPDATE tyontekija SET kaytettavyysID = 3 WHERE tyontekijasposti = :tyontekijasposti";
    $komento = $yhteys->prepare($haku);
    $komento->execute([
    'tyontekijasposti' => $tyontekijasposti
    ]);
        $button_class3 = 'btn-primary'; // Update the button class for the success state
    } else {
        $button_class3 = 'btn-light'; // Use default button class for the initial state
    }

    $_SESSION['button_class3'] = $button_class3; // Store the button class in a session variable
    header("Location: tyontekijaApp.php");
// Check if the poissa form has been submitted
if(isset($_POST['poissa'])) {
    $poissa = $_POST['poissa'];
    $tyontekijasposti = $_SESSION['email'];

    // Update the tyontekija table
    $haku = "UPDATE tyontekija SET kaytettavyysID = 4 WHERE tyontekijasposti = :tyontekijasposti";
    $komento = $yhteys->prepare($haku);
    $komento->execute([
    'tyontekijasposti' => $tyontekijasposti
    ]);
        $button_class4 = 'btn-danger'; // Update the button class for the success state
    } else {
        $button_class4 = 'btn-light'; // Use default button class for the initial state
    }

    $_SESSION['button_class4'] = $button_class4; // Store the button class in a session variable
    header("Location: tyontekijaApp.php");
?>
