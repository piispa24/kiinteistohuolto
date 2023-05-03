<?php

include("connect.php");

$kysely = "SELECT *, taloyhtio.taloyhtionnimi 
            FROM asukas 
            INNER JOIN 
            taloyhtio 
            ON asukas.taloyhtioID = taloyhtio.taloyhtioID";
$data = $yhteys->query($kysely);

$JSON = '{"auto":[';
$laskuri = 0;
$riveja = $data->rowCount();

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){
    $laskuri++;
    $JSON.='{"AsukasID":"'.$rivi['asukasID'].'","Asukasnimi":"'.$rivi['asukasnimi'].'","Asukassposti":"'.$rivi['asukassposti'].'","Asukaspuhnro":"'.$rivi['Asukaspuhnro'].'","Taloyhtionimi":"'.$rivi['taloyhtionnimi'].'","Huoneisto":"'.$rivi['huoneisto'].'"}';
    if($laskuri<$riveja) $JSON.=",";
}


$JSON.=']}';
$yhteys = null;

$handler = fopen("data.json", "w");
fwrite($handler, $JSON);
fclose($handler);

?>