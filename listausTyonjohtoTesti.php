<?php

header("Acces-Control-Allow-Origin: ");

include("connect.php");
//$kysely = "SELECT *, asukas.asukasnimi, taloyhtio.osoite FROM vikailmoitus INNER JOIN asukas ON vikailmoitus.asukasID = asukas.asukasID INNER JOIN taloyhtio ON vikailmoitus.taloyhtionID = taloyhtio.taloyhtioID";
$kysely = "SELECT *, asukas.asukasnimi, taloyhtio.osoite, COALESCE(tyontekija.tyontekijanimi, 'Null') as tyontekijanimi FROM vikailmoitus INNER JOIN asukas ON vikailmoitus.asukasID = asukas.asukasID INNER JOIN taloyhtio ON vikailmoitus.taloyhtionID = taloyhtio.taloyhtioID LEFT JOIN tyontekija ON vikailmoitus.tyontekijaID = tyontekija.tyontekijaID WHERE ratkaisu IS NULL";

$data = $yhteys->query($kysely);

$JSON = '{"auto":[';
$laskuri = 0;
$riveja = $data->rowCount();

while($rivi = $data->fetch(PDO::FETCH_ASSOC)){
    $laskuri++;
    $JSON.='{"VikailmoitusID":"'.$rivi['vikailmoitusID'].'","AsukasID":"'.$rivi['asukasID'].'","TaloyhtionID":"'.$rivi['taloyhtionID'].'","Vikaotsikko":"'.$rivi['vikaotsikko'].'","Vikaasia":"'.$rivi['vikaasia'].'","TyontekijaID":"'.$rivi['tyontekijaID'].'","Asukasnimi":"'.$rivi['asukasnimi'].'","Osoite":"'.$rivi['osoite'].'","Tyontekijanimi":"'.$rivi['tyontekijanimi'].'"}';
    if($laskuri<$riveja) $JSON.=",";
}


$JSON.=']}';
$yhteys = null;

$handler = fopen("data.json", "w");
fwrite($handler, $JSON);
fclose($handler);

?>