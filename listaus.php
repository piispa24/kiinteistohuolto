<?php

header("Acces-Control-Allow-Origin: ");

include("connect.php");
$kysely = "SELECT *, asukas.asukasnimi, taloyhtio.osoite FROM vikailmoitus INNER JOIN asukas ON vikailmoitus.asukasID = asukas.asukasID INNER JOIN taloyhtio ON vikailmoitus.taloyhtionID = taloyhtio.taloyhtioID";
//$kysely = "SELECT * FROM vikailmoitus INNER JOIN asukas ON vikailmoitus.asukasID = asukas.asukasID INNER JOIN taloyhtio ON vikailmoitus.taloyhtionID = taloyhtio.taloyhtioID INNER JOIN tyontekija ON vikailmoitus.tyontekijaID = tyontekija.tyontekijaID";
$data = $yhteys->query($kysely);

$JSON = '{"auto":[';
$laskuri = 0;
$riveja = $data->rowCount();

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){
    $laskuri++;
    $JSON.='{"VikailmoitusID":"'.$rivi['vikailmoitusID'].'","AsukasID":"'.$rivi['asukasID'].'","TaloyhtionID":"'.$rivi['taloyhtionID'].'","Vikaotsikko":"'.$rivi['vikaotsikko'].'","Vikaasia":"'.$rivi['vikaasia'].'","TyontekijaID":"'.$rivi['tyontekijaID'].'","Asukasnimi":"'.$rivi['asukasnimi'].'","Osoite":"'.$rivi['osoite'].'"}';
    if($laskuri<$riveja) $JSON.=",";
}


$JSON.=']}';
$yhteys = null;

$handler = fopen("data.json", "w");
fwrite($handler, $JSON);
fclose($handler);

?>
