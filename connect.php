<?php
    header('Content-Type:text/html; charset=utf-8');

try{
    $palvelin = "localhost";
    $tietokanta = "kiinteistohuolto";
    $tunnus = "root";
    $salasana = "";

    $yhteys = new PDO("mysql:host=$palvelin;dbname=$tietokanta", $tunnus, $salasana);
    $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $virhe){
    echo "Virhe on " . $virhe->getMessage();
}
//echo "Voooooi että onnistui hyvin";
?>