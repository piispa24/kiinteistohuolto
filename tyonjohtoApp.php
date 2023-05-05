<?php 
require "header.php";
if(!isset($_SESSION['tyojohtoemail'])){
  header("Location: tyokirjautuminen.php");
  exit;
}
?>

<div class="container-fluid p-0 container-paneeli">

  <div class="row">
    <div class="col-sm-12 pt-5 tyontekijaRivi">
      <p><a class="underline btn btn-danger btn-large" href="tyonjohtoVikalistaus.php">Katso vikailmoitukset</a></p>
    </div>
  </div>
    <div class="row">
    <div class="col-sm-12 p-3 tyontekijaRivi">
      <p><a class="underline btn btn-danger btn-large" href="tyontekijaStatus.php">Katso työntekijän status</a></p>
    </div>
    </div>


  <div class="row tyontekijaRivi">
  <div class="col-sm-12 p-3 tyontekijaRivi">
      <p><a class="underline btn btn-danger btn-large" href="katsoYhteydenotto.php">Katso uudet yhteydenotot</a></p>
    </div>
      </div>

    <div class="row">
    <div class="col-sm-12 p-3 tyontekijaRivi">
      <p><a class="underline btn btn-danger btn-large" href="tyontekijaRekisterointi.php">Lisää työntekijä</a></p>
    </div>
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