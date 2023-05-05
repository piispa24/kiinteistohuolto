<?php session_start();
require "connect.php";
require "header.php"; 
if(!isset($_SESSION['email']) && (!isset($_SESSION['sposti'])) && (!isset($_SESSION['isannsposti'])) && (!isset($_SESSION['tyojohtoemail']))){
  header("Location: asukaskirjautuminen.php");
  exit;
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
// Hakee asukkaan asukasIDn ja taloyhtioIDn tietokannasta
$email = $_SESSION['sposti']; // Valitsee asukkaan session
$query = "SELECT asukasID, taloyhtioID FROM asukas WHERE asukassposti = :asukassposti";
$stmt = $yhteys->prepare($query);
$stmt->bindParam(':asukassposti', $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Esitäytä formin kentät
$asukasID = $result['asukasID'];
$taloyhtionID = $result['taloyhtioID'];
?>

<?php

// Asukkaan vikailmoitus tietokantaan
if(isset($_POST['talleta'])){
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
        header("location:vikailmoitusApp.php?success=true");
    }
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
            <input type="hidden" class="form col-sm-4" placeholder="" name="asukas" value="<?php echo $asukasID; ?>">
        </div>

        <div class="mb-1 mt-4" style="display: none;">
            <label for="otsikko" class="form-label"></label>
            <input type="hidden" class="form col-sm-4" placeholder="" name="taloyhtio" value="<?php echo $taloyhtionID; ?>">
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>

