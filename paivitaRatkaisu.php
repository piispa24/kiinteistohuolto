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
    $ratkaisu = $_POST['ratkaisu'];
    $vikailmoitusID = $_GET['vikailmoitusID'];

    if (empty($ratkaisu)) {
        echo '<div class="alert alert-danger">Täytä kentät!</div>';
    } else {
        $kysely = "UPDATE vikailmoitus SET ratkaisu = :ratkaisu WHERE vikailmoitus.vikailmoitusID = :vikailmoitusID";
        $stmt = $yhteys->prepare($kysely);
        $stmt->bindParam(':ratkaisu', $ratkaisu);
        $stmt->bindParam(':vikailmoitusID', $vikailmoitusID);
        $stmt->execute();
        header("Location: katsoTyontehtavat.php");
    }
}
?>

<?php
$email = $_SESSION['email'];
$vikailmoitusID = $_GET['vikailmoitusID'];
$query = "SELECT vikailmoitus.ratkaisu
FROM vikailmoitus  
WHERE vikailmoitusID = :vikailmoitusID";

$stmt = $yhteys->prepare($query);
$stmt->bindParam(':vikailmoitusID', $vikailmoitusID);
$stmt->execute();
$results = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div id="contactBg" class="container mt-5 bg-light p-5">
    <p><a href=katsoTyontehtavat.php class="btn btn-success">Takaisin</a></p>

    <form method="POST" action="">

        <h5>Ratkaisu:</h5> 
        <div class="mb-3">
            <label for="asia" class="form-label"></label>
            <textarea class="form-control" id="ratkaisuForm" name="ratkaisu" rows="5"><?php echo $results['ratkaisu']; ?></textarea>

        </div>

        <button name="talleta" id="yhteysBtn" type="submit" class="btn btn-success mt-3">Tallenna ratkaisu</button>

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