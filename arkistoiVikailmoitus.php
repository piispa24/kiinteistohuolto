<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require "connect.php";
require "header.php"; 

if(!isset($_SESSION['email'])){
  header("Location: kirjautuminen.php");
  exit;
}
?>

<?php
// Päivittää asian
if(isset($_POST['talleta'])){
    $tyontekijaID = $_POST['tyontekijaID'];
    $ratkaisu = $_POST['ratkaisu'];
    $vikailmoitusID = $_GET['vikailmoitusID'];

    if (empty($ratkaisu)) {
        echo '<div class="alert alert-danger">Täytä kentät!</div>';
    } else {
        //Siirtää datan tyontekijatehtaviin arkistoon
        $kysely = "INSERT INTO tyontekijatehtavat (vikailmoitusID, tyontekijaID, ratkaisu) VALUES (:vikailmoitusID, :tyontekijaID, :ratkaisu)";
        $stmt = $yhteys->prepare($kysely);
        $stmt->bindParam(':ratkaisu', $ratkaisu);
        $stmt->bindParam(':tyontekijaID', $tyontekijaID);
        $stmt->bindParam(':vikailmoitusID', $vikailmoitusID);
        $stmt->execute();
        //poistaa tehtavan vikailmoituksista
        $kysely = "DELETE FROM vikailmoitus WHERE vikailmoitusID = :vikailmoitusID";
        $stmt = $yhteys->prepare($kysely);
        $stmt->bindParam(':vikailmoitusID', $vikailmoitusID);
        $stmt->execute();
        header("Location: katsoTyontehtavat.php");
    }
}
?>

<?php
$email = $_SESSION['email'];
$vikailmoitusID = $_GET['vikailmoitusID'];

$query = "SELECT *, asukas.asukasnimi, taloyhtio.taloyhtionnimi, tyontekija.tyontekijasposti 
          FROM vikailmoitus 
          INNER JOIN taloyhtio 
          ON vikailmoitus.taloyhtionID = taloyhtio.taloyhtioID 
          INNER JOIN asukas ON vikailmoitus.asukasID = asukas.asukasID 
          INNER JOIN tyontekija ON vikailmoitus.tyontekijaID = tyontekija.tyontekijaID 
          WHERE tyontekijasposti = :tyontekijasposti
          AND vikailmoitusID = :vikailmoitusID";

$stmt = $yhteys->prepare($query);
$stmt->bindParam(':tyontekijasposti', $email);
$stmt->bindParam(':vikailmoitusID', $vikailmoitusID);
$stmt->execute();
$results = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<div id="contactBg" class="container mt-5 bg-light p-5">
    <p><a href=katsoTyontehtavat.php class="btn btn-success">Takaisin</a></p>
    <h1>Arkistoituasi tehtävän et voi enää tarkastella tai muokata sitä</h1>
    <form method="POST" action="">
 
    <div class="mb-1 mt-4" style="display: none;">
        <label for="otsikko" class="form-label"></label>
        <input type="hidden" class="form col-sm-4" placeholder="" name="vikailmoitusID" value="<?php echo $results['vikailmoitusID']; ?>">
    </div>
    <div class="mb-1 mt-4" style="display: none;">
        <label for="otsikko" class="form-label"></label>
        <input type="v" class="form col-sm-4" placeholder="" name="tyontekijaID" value="<?php echo $results['tyontekijaID']; ?>">
    </div>
    <div class="mb-1 mt-4" style="display: none;">
        <label for="otsikko" class="form-label"></label>
        <input type="hidden" class="form col-sm-4" placeholder="" name="ratkaisu" value="<?php echo $results['ratkaisu']; ?>">
    </div>
        
        <button name="talleta" id="yhteysBtn" type="submit" class="btn btn-danger mt-3">Arkistoi Tehtävä</button>

    </form>
</div>
    

<?php require "footer.php"; ?>