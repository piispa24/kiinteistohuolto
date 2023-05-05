<?php
require "connect.php"; 

if(isset($_GET['YhteysID'])){
    $yhtID = $_GET['YhteysID'];
    $kysely = "DELETE FROM yhteydenotto WHERE yhteydenottoID = :YhteysID";
    $poista = $yhteys->prepare($kysely);
    $poista->bindValue(':YhteysID', $yhtID, PDO::PARAM_INT);
    $poista->execute();
    header("location: katsoYhteydenotto.php");
}

?>