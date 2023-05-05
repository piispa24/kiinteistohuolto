<?php
require "header.php"; 
require "connect.php";

if(!isset($_SESSION['email'])){
  header("Location: kirjautuminen.php");
  exit;
}
// Tarkistaa jos kaytettavissa nappia on painettu
if (isset($_POST['kaytettavissa'])) {
    $kaytettavissa = $_POST['kaytettavissa']; // Asettaa kaytettavissa arvon muuttujaan ja arvoksi true
    $tyontekijasposti = $_SESSION['email']; // Hakee työntekijän session
  
    // Kysely päivittämään tietokanta
    $haku = "UPDATE tyontekija SET kaytettavyysID = 1 WHERE tyontekijasposti = :tyontekijasposti";
    $komento = $yhteys->prepare($haku);
    $komento->execute([
      'tyontekijasposti' => $tyontekijasposti
    ]);
        $button_class = 'btn-success'; // Päivittää napin värin jos nappia painettu
    } else {
        $button_class = 'btn-light'; // Muuten pitää napin värin defaultina
    }
    
    $_SESSION['button_class'] = $button_class; // Säilyttää napin luokan session muuttujassa
    
    header("Location: tyontekijaApp.php");
    
// Sama toiminnallisuus toistuu alla joten ylläolevat kommentit pätee

if(isset($_POST['keikalla'])) {
    $keikalla = $_POST['keikalla'];
    $tyontekijasposti = $_SESSION['email'];

    // Update the tyontekija table
    $haku = "UPDATE tyontekija SET kaytettavyysID = 2 WHERE tyontekijasposti = :tyontekijasposti";
    $komento = $yhteys->prepare($haku);
    $komento->execute([
    'tyontekijasposti' => $tyontekijasposti
    ]);
        $button_class2 = 'btn-warning';
    } else {
        $button_class2 = 'btn-light';
    }
    
    $_SESSION['button_class2'] = $button_class2;
    header("Location: tyontekijaApp.php");

if(isset($_POST['tauolla'])) {
    $tauolla = $_POST['tauolla'];
    $tyontekijasposti = $_SESSION['email'];

    $haku = "UPDATE tyontekija SET kaytettavyysID = 3 WHERE tyontekijasposti = :tyontekijasposti";
    $komento = $yhteys->prepare($haku);
    $komento->execute([
    'tyontekijasposti' => $tyontekijasposti
    ]);
        $button_class3 = 'btn-primary';
    } else {
        $button_class3 = 'btn-light'; 
    }

    $_SESSION['button_class3'] = $button_class3; 
    header("Location: tyontekijaApp.php");

if(isset($_POST['poissa'])) {
    $poissa = $_POST['poissa'];
    $tyontekijasposti = $_SESSION['email'];

    $haku = "UPDATE tyontekija SET kaytettavyysID = 4 WHERE tyontekijasposti = :tyontekijasposti";
    $komento = $yhteys->prepare($haku);
    $komento->execute([
    'tyontekijasposti' => $tyontekijasposti
    ]);
        $button_class4 = 'btn-danger';
    } else {
        $button_class4 = 'btn-light';
    }

    $_SESSION['button_class4'] = $button_class4;
    header("Location: tyontekijaApp.php");
?>
