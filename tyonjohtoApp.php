<?php session_start(); ?>
<?php 
require "header.php";
if(!isset($_SESSION['tyojohtoemail'])){
  header("Location: tyokirjautuminen.php");
  exit;
}
?>

<div class="container-fluid p-5">
  <div class="row">
    <div class="col-sm-6 p-5 tyontekijaRivi">
      <p><a class="underline btn tyontekijaBtn" href="vikailmoitusListaus.php">Katso vikailmoitukset</a></p>
    </div>
    <div class="col-sm-6 p-5 tyontekijaRivi">
      <p><a class="underline btn tyontekijaBtn" href="tyontekijaStatus.php">Katso työntekijän status</a></p>
    </div>
  </div>
  <div class="row tyontekijaRivi">
  <div class="col-sm-6 p-5 tyontekijaRivi">
      <p><a class="underline btn tyontekijaBtn" href="####">Katso uudet yhteydenotot</a></p>
    </div>
    <div class="col-sm-6 p-5 tyontekijaRivi">
      <p><a class="underline btn tyontekijaBtn" href="tyontekijaRekisterointi.php">Lisää työntekijä</a></p>
    </div>
  </div>
</div>


<?php require "footer.php"; ?>