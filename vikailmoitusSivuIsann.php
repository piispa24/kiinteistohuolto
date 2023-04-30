<?php session_start();
require "connect.php";
require "header.php"; 
if(!isset($_SESSION['email']) && (!isset($_SESSION['sposti'])) && (!isset($_SESSION['isannsposti'])) && (!isset($_SESSION['tyojohtoemail']))){
  header("Location: isankirjautuminen.php");
  exit;
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

// Hakee taloyhtion nimen

// Hakee isännöitsijän isannoitsijaIDn tietokannasta
$email = $_SESSION['isannsposti']; // Valitsee isännöitsijän session
$query = "SELECT isannoitsija.isannoitsijaID, taloyhtio.taloyhtioID, taloyhtio.taloyhtionnimi, taloyhtio.talotyyppiID, taloyhtio.osoite 
            FROM isannoitsija 
            INNER JOIN taloyhtio ON isannoitsija.taloyhtioID = taloyhtio.taloyhtioID 
            WHERE isannoitsija.isannoitsijasposti = :isannoitsijasposti";

$haku = $yhteys->prepare($query);
$haku->bindParam(':isannoitsijasposti', $email);
$haku->execute();
$result = $haku->fetch(PDO::FETCH_ASSOC);

// Esitäytä formin kentät
$isannoitsijaID = $result['isannoitsijaID'];
$taloyhtioID = $result['taloyhtioID'];
// Taloyhtionnimi
$taloyhtionnimi = $result['taloyhtionnimi'];
?>

<?php

// Isännöitsijän vikailmoitus tietokantaan
if(isset($_POST['talletaa'])){
    $asukas = $_POST['asukas'];
    $taloyhtio = $_POST['taloyhtio'];
    $otsikko = $_POST['otsikko'];
    $asia = $_POST['asia'];

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

<div id="contactBg" class="container mt-5 bg-light p-5">
    <!-- Vie takaisin isännöitsijän vikailmoitusappisessioon -->
    <?php if(isset($_SESSION['isannsposti'])): ?>
        <p><a href=isannoitsijaApp.php class="btn btn-success">Takaisin</a></p>
    <?php endif; ?>
      <h4>Tee vikailmoitus <?php echo $taloyhtionnimi; ?> taloyhtiöön</h4><br>


    <form method="POST" action="vikailmoitusSivuIsann.php">

    <div class="mb-1 mt-4" style="display: none;">
        <label for="otsikko" class="form-label"></label>
        <input type="hidden" class="form col-sm-4" placeholder="" name="isannoitsija" value="<?php echo $isannoitsijaID; ?>">
    </div>

    <div class="mb-1 mt-4" style="display: none;">
        <label for="otsikko" class="form-label"></label>
        <input type="hidden" class="form col-sm-4" placeholder="" name="taloyhtio" value="<?php echo $taloyhtioID; ?>">

    </div>
    <h5>AsukasID:</h5>  
    <div class="mb-4 mt-4">
        <label for="otsikko" class="form-label"></label>
        <input type="text" class="form col-sm-4" id="yhteysOtsikko" placeholder="" name="asukas">
    </div>
    <h5>Otsikko:</h5>  
    <div class="mb-4 mt-4">
        <label for="otsikko" class="form-label"></label>
        <input type="text" class="form col-sm-4" id="yhteysOtsikko" placeholder="" name="otsikko">
    </div>
    <h5>Asia:</h5> 
    <div class="mb-3">
        <label for="asia" class="form-label"></label>
        <textarea type="text" class="form-control" id="yhteysAsia" placeholder="Asia" name="asia" rows="5"></textarea>
    </div>
    <button name="talletaa" id="yhteysBtn" type="submit" class="btn btn-success mt-3">Lähetä vikailmoitus</button>
    </form>
</div>

<?php require "footer.php"; ?>


