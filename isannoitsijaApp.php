<?php session_start(); ?>
<?php 
require "header.php";
if(!isset($_SESSION['isannsposti'])){
  header("Location: isankirjautuminen.php");
  exit;
}
 ?>

<div class="container-fluid p-5">
  <div class="row">
    <div class="col-6 p-5 tyontekijaRivi">
      <p><a class="underline btn btn-grad" href="vikailmoitusSivuIsann.php">Tee vikailmoitus</a></p>
    </div>

    <div class="col-6 p-5 tyontekijaRivi">
      <p><a class="underline btn btn-grad" href="asukasRekisterointi.php">Lisää asukas</a></p>
    </div>
</div>


<?php require "footer.php"; ?>