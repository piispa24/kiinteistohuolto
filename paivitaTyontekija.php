<?php
session_start();
require "connect.php";

if(!isset($_SESSION['tyojohtoemail'])){
    header("Location: tyokirjautuminen.php");
    exit;
}

if (isset($_POST['VikailmoitusID']) && isset($_POST['Tyontekijanimi'])) {
    $vikaID = $_POST['VikailmoitusID'];
    $tyontekijaNimi = $_POST['Tyontekijanimi'];
    
    if ($tyontekijaNimi == "NULL") {
        $tyontekijaID = null;
    } else {
        $query = "SELECT tyontekijaID FROM tyontekija WHERE tyontekijanimi = ?";
        $stmt = $yhteys->prepare($query);
        $stmt->execute([$tyontekijaNimi]);
        $tyontekija = $stmt->fetch(PDO::FETCH_ASSOC);
        $tyontekijaID = $tyontekija['tyontekijaID'];
    }
    
    $query = "UPDATE vikailmoitus SET tyontekijaID = ? WHERE vikailmoitusID = ?";
    $stmt = $yhteys->prepare($query);
    $stmt->execute([$tyontekijaID, $vikaID]);
}
header("Location: tyonjohtoVikalistaus.php");
exit;


?>
