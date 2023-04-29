<?php session_start();
require "header.php"; 
if(!isset($_SESSION['email'])){
  header("Location: kirjautuminen.php");
  exit;
}
?>

<div class="container-fluid p-5">
  <div class="row">
    <div class="col-sm-6 p-5 tyontekijaRivi">
      <p><a class="underline btn btn-grad" href="vikailmoitusListaus.php">Katso vikailmoitukset</a></p>
    </div>

    <div class="col-sm-6 p-5 tyontekijaRivi">
      <p><a class="underline btn btn-grad" href="#####">Katso omat työtehtävät</a></p>
    </div>
</div>


<?php require "footer.php"; ?>