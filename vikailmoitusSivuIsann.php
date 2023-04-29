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
// Hakee isännöitsijän isannoitsijaIDn tietokannasta
$email = $_SESSION['isannsposti']; // Valitsee asukkaan session
$query = "SELECT isannoitsijaID, taloyhtioID FROM isannoitsija WHERE isannoitsijasposti = :isannoitsijasposti";
$stmt = $yhteys->prepare($query);
$stmt->bindParam(':isannoitsijasposti', $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Esitäytä formin kentät
$isannoitsijaID = $result['isannoitsijaID'];
$taloyhtioID = $result['taloyhtioID'];
?>

<?php

// Asukkaan vikailmoitus tietokantaan
if(isset($_POST['talleta'])){
    $asukas = $_POST['asukas'];
    $taloyhtio = $_POST['taloyhtio'];
    $otsikko = $_POST['otsikko'];
    $asia = $_POST['asia'];

    $kysely = "INSERT INTO vikailmoitus (asukasID, taloyhtionID, vikaotsikko, vikaasia) 
    VALUES (:asukasID, :taloyhtionID, :vikaotsikko, :vikaasia)";

    $lisaa = $yhteys->prepare($kysely);
    $lisaa->bindValue(':asukasID', $asukas, PDO::PARAM_STR);
    $lisaa->bindValue(':taloyhtionID', $taloyhtio, PDO::PARAM_STR);
    $lisaa->bindValue(':vikaotsikko', $otsikko, PDO::PARAM_STR);
    $lisaa->bindValue(':vikaasia', $asia, PDO::PARAM_STR);

    $lisaa->execute();
    header("location:index.php");
}
?>

<div id="contactBg" class="container mt-5 bg-light p-5">
    <!-- Vie takaisin asukkaan vikailmoitusappisessioon -->
<?php if(isset($_SESSION['sposti'])): ?>
        <p><a href=vikailmoitusApp.php class="btn btn-success">Takaisin</a></p>
      <?php endif; ?>
<h4>Tee vikailmoitus yhtiöön</h4><br>

    <form method="POST" action="vikailmoitusSivu.php">

    <div class="mb-1 mt-4" style="display: none;">
        <label for="otsikko" class="form-label"></label>
        <input type="hidden" class="form col-sm-4" placeholder="" name="isannoitsija" value="<?php echo $isannoitsijaID; ?>">
    </div>

    <div class="mb-1 mt-4" style="display: none;">
        <label for="otsikko" class="form-label"></label>
        <input type="hidden" class="form col-sm-4" placeholder="" name="taloyhtio" value="<?php echo $taloyhtioID; ?>">

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
    <button name="talleta" id="yhteysBtn" type="submit" class="btn btn-success mt-3">Lähetä vikailmoitus</button>
    </form>
</div>

<?php require "footer.php"; ?>


