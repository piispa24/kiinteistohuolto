<?php session_start();
require "connect.php";
require "header.php"; 
if(!isset($_SESSION['email'])){
  header("Location: kirjautuminen.php");
  exit;
}

?>
<?php
$email = $_SESSION['email'];
$query = "SELECT *, asukas.asukasnimi, taloyhtio.taloyhtionnimi, tyontekija.tyontekijasposti 
FROM vikailmoitus 
INNER JOIN taloyhtio 
ON vikailmoitus.taloyhtionID = taloyhtio.taloyhtioID 
INNER JOIN asukas ON vikailmoitus.asukasID = asukas.asukasID 
INNER JOIN tyontekija ON vikailmoitus.tyontekijaID = tyontekija.tyontekijaID 
WHERE tyontekijasposti = :tyontekijasposti";

$stmt = $yhteys->prepare($query);
$stmt->bindParam(':tyontekijasposti', $email);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
if(isset($_POST['tallenna'])){
    $asukas = $_POST['asukas'];
    

    if (empty($otsikko) || empty($asia)) {
        echo '<div class="alert alert-danger">Täytä kentät!</div>';
    } else {
        $kysely = "INSERT INTO vikailmoitus (asukasID, taloyhtionID, vikaotsikko, vikaasia) 
        VALUES (:asukasID, :taloyhtionID, :vikaotsikko, :vikaasia)";
    
        $lisaa = $yhteys->prepare($kysely);
        $lisaa->bindValue(':asukasID', $asukas, PDO::PARAM_STR);
        $lisaa->bindValue(':taloyhtionID', $taloyhtio, PDO::PARAM_STR);
        $lisaa->bindValue(':vikaotsikko', $otsikko, PDO::PARAM_STR);
        $lisaa->bindValue(':vikaasia', $asia, PDO::PARAM_STR);
    
        $lisaa->execute();
        header("location:isannoitsijaApp.php?success=true");
    }
}
?>

            <div class="container">
            <form method="POST" action="paivitaRatkaisu.php?vikailmoitusID=<?php $result['vikailmoitusID']; ?>">
                
                <tr>
                    <td>Asia</td>
                    <td><input type="text" name="km" value="<?php echo $result['vikailmoitusID']; ?>"></td>
                </tr>
                <tr>
                    <td><button class="btn btn-warning" name="tallenna" type="submit">Tallenna</button></td>
                </tr>
            </form>
            </div>
    

<?php require "footer.php"; ?>