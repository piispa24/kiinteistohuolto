<?php

header("Acces-Control-Allow-Origin: ");

include("connect.php");
$kysely = "SELECT *, kaytettavyys.kaytettavyys FROM tyontekija INNER JOIN kaytettavyys ON tyontekija.kaytettavyysID = kaytettavyys.kaytettavyysID";
$data = $yhteys->query($kysely);

$JSON = '{"auto":[';
$laskuri = 0;
$riveja = $data->rowCount();

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){
    $laskuri++;
    $JSON.='{"TyontekijaID":"'.$rivi['tyontekijaID'].'","Tyontekijanimi":"'.$rivi['tyontekijanimi'].'","Tyontekijapuhnro":"'.$rivi['tyontekijapuhnro'].'","Tyontekijasposti":"'.$rivi['tyontekijasposti'].'","KaytettavyysID":"'.$rivi['kaytettavyysID'].'","RooliID":"'.$rivi['rooliID'].'","Kaytettavyys":"'.$rivi['kaytettavyys'].'"}';
    if($laskuri<$riveja) $JSON.=",";
}


$JSON.=']}';
$yhteys = null;

$handler = fopen("data.json", "w");
fwrite($handler, $JSON);
fclose($handler);

?>