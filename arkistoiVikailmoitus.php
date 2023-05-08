<?php
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
        /*$kysely = "DELETE FROM vikailmoitus WHERE vikailmoitusID = :vikailmoitusID";
        $stmt = $yhteys->prepare($kysely);
        $stmt->bindParam(':vikailmoitusID', $vikailmoitusID);
        $stmt->execute();*/
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
    <h5>Arkistoituasi tehtävän et voi enää tarkastella tai muokata sitä</h5>
    <form method="POST" action="">
 
    <div class="mb-1 mt-4" style="display: none;">
        <label for="otsikko" class="form-label"></label>
        <input type="hidden" class="form col-sm-4" placeholder="" name="vikailmoitusID" value="<?php echo $results['vikailmoitusID']; ?>">
    </div>
    <div class="mb-1 mt-4" style="display: none;">
        <label for="otsikko" class="form-label"></label>
        <input type="hidden" class="form col-sm-4" placeholder="" name="tyontekijaID" value="<?php echo $results['tyontekijaID']; ?>">
    </div>
    <div class="mb-1 mt-4" style="display: none;">
        <label for="otsikko" class="form-label"></label>
        <input type="hidden" class="form col-sm-4" placeholder="" name="ratkaisu" value="<?php echo $results['ratkaisu']; ?>">
    </div>
        
        <button name="talleta" id="yhteysBtn" type="submit" class="btn btn-danger mt-3">Arkistoi Tehtävä</button>

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