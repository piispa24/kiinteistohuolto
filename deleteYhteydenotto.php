<?php

require "connect.php"; 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET['YhteysID'])){
    $yhtID = $_GET['YhteysID'];
    $kysely = "DELETE FROM yhteydenotto WHERE yhteydenottoID = :YhteysID";
    $poista = $yhteys->prepare($kysely);
    $poista->bindValue(':YhteysID', $yhtID, PDO::PARAM_INT);
    $poista->execute();
    header("location: katsoYhteydenotto.php");
}

?>