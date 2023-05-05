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
    

<?php require "footer.php"; ?>