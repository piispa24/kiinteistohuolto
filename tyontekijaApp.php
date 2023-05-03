<?php session_start();
require "header.php"; 
if(!isset($_SESSION['email'])){
  header("Location: kirjautuminen.php");
  exit;
}
?>

<div class="container-fluid p-0 container-paneeli">
  
    <div class="row">
        <div class="col-sm-12 pt-5 tyontekijaRivi">
          <p><a class="underline btn btn-danger btn-large" href="vikailmoitusListaus.php">Katso vikailmoitukset</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 pt-5 tyontekijaRivi">
          <p><a class="underline btn btn-danger btn-large" href="katsoTyontehtavat.php">Katso omat työtehtävät</a></p>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>