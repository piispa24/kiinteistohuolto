<?php session_start()?>
<?php require 
"header.php"; 
if(!isset($_SESSION['sposti'])){
  header("Location: asukaskirjautuminen.php");
  exit;
}
?>

<div class="container-fluid p-0 container-paneeli">
  
<!-- Alert jos vikailmoituksen jättö onnistui. Hakee successin vikailmoitusSivu.php:sta -->
<?php if(isset($_GET['success'])): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Ilmoitus jätetty onnistuneesti!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

  <div class="row">
      <div class="col-sm-12 p-5 tyontekijaRivi">
        <p><a class="underline btn btn-danger btn-large" href="vikailmoitusSivu.php">Tee vikailmoitus</a></p>
      </div>
  </div>
  <div class="row">
  <div class="col-sm-12 p-3 tyontekijaRivi">
        <p><a class="underline btn btn-danger btn-large" href="asukasTiedot.php">Katso omat tiedot</a></p>
      </div>
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