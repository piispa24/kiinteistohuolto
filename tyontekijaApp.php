<?php session_start();
require "header.php"; 
if(!isset($_SESSION['email'])){
  header("Location: kirjautuminen.php");
  exit;
}
?>

<div class="container-fluid p-5">
  <div class="row">
    <div class="col-6 p-5 tyontekijaRivi">
      <p><a class="underline btn tyontekijaBtn" href="vikailmoitusListaus.php">Katso vikailmoitukset</a></p>
    </div>

    <div class="col-6 p-5 tyontekijaRivi">
      <p><a class="underline btn tyontekijaBtn" href="#####">Katso omat vikailmoitukset</a></p>
    </div>
</div>


<?php require "footer.php"; ?>