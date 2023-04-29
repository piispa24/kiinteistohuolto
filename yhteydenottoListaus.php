<?php

header("Acces-Control-Allow-Origin: ");

include("connect.php");
$kysely = "SELECT * FROM yhteydenotto";
$data = $yhteys->query($kysely);

$JSON = '{"auto":[';
$laskuri = 0;
$riveja = $data->rowCount();

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){
    $laskuri++;
    $JSON.='{"YhteydenottoID":"'.$rivi['yhteydenottoID'].'","Yhtnimi":"'.$rivi['yhtnimi'].'","Yhtotsikko":"'.$rivi['yhtotsikko'].'","Yhtasia":"'.$rivi['yhtasia'].'","Yhtpuhnro":"'.$rivi['yhtpuhnro'].'","Yhtsposti":"'.$rivi['yhtsposti'].'"}';
    if($laskuri<$riveja) $JSON.=",";
}


$JSON.=']}';
$yhteys = null;

$handler = fopen("data.json", "w");
fwrite($handler, $JSON);
fclose($handler);

?>