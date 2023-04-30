<?php session_start()?>
<?php require 
"header.php"; 
if(!isset($_SESSION['sposti'])){
  header("Location: asukaskirjautuminen.php");
  exit;
}
?>

<div class="container-fluid p-0 container-paneeli">
  <div class="container">
<!-- Alert jos vikailmoituksen jättö onnistui. Hakee successin vikailmoitusSivu.php:sta -->
<?php if(isset($_GET['success'])): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Ilmoitus jätetty onnistuneesti!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

  <div class="row">
      <div class="col-sm-6 p-5 tyontekijaRivi">
        <p><a class="underline btn btn-grad" href="vikailmoitusSivu.php">Tee vikailmoitus</a></p>
      </div>

      <div class="col-sm-6 p-5 tyontekijaRivi">
        <p><a class="underline btn btn-grad" href="#######">Katso omat tiedot</a></p>
      </div>
  </div>
  </div>


<?php require "footer.php"; ?>