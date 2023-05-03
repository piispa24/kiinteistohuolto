<?php session_start(); ?>
<?php 
require "header.php";
if(!isset($_SESSION['isannsposti'])){
  header("Location: isankirjautuminen.php");
  exit;
}
?>

<div class="container-fluid p-0 container-paneeli">
  
    <!-- Alert jos vikailmoituksen jättö onnistui. Hakee successin vikailmoitusSivuIsann.php:sta -->
    <?php if(isset($_GET['success'])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Ilmoitus jätetty onnistuneesti!</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

      <div class="row">
        <div class="col-sm-12 p-5 tyontekijaRivi">
          <p>
            <a class="underline btn btn-danger btn-large" href="vikailmoitusSivuIsann.php">Tee vikailmoitus</a>
          </p>
      </div>
      </div>

      <div class="row">
      <div class="col-sm-12 p-3 tyontekijaRivi">
          <p>
            <a class="underline btn btn-danger btn-large" href="asukasRekisterointi.php">Lisää asukas</a>
          </p>
        </div>
      </div>


  </div>




<?php require "footer.php"; ?>