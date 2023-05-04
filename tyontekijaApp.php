<?php session_start();
require "header.php"; 
if(!isset($_SESSION['email'])){
  header("Location: kirjautuminen.php");
  exit;
}


?>

<div class="container-fluid container-paneeli">
  
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
    
    <!-- Työntekijän käytettävyys -->

    <div class="row ">
      <div class="col-sm-3 tyontekijaRivi">
        <form method="POST" action="kaytettavyys.php">
          <div class="position-relative">
            <button type="button" class="btn btn-large bg-light position-absolute w-100 h-100 underline"></button>
            <button type="submit" name="kaytettavissa" class="underline btn btn-large text-dark <?php echo $_SESSION['button_class']; ?> position-relative z-index-1">Käytettävissä</button>
          </div>
        </form>
      </div>

        <div class="col-sm-3 tyontekijaRivi">
          <form method="POST" action="kaytettavyys.php">
          <div class="position-relative">
            <button type="button" class="btn btn-large bg-light position-absolute w-100 h-100 underline"></button>
            <button type="submit" name="keikalla" class="underline btn btn-large text-dark <?php echo $_SESSION['button_class2']; ?> position-relative z-index-1">Keikalla</button>
          </div>
          </form>
        </div>

        <div class="col-sm-3 tyontekijaRivi">
          <form method="POST" action="kaytettavyys.php">
            <div class="position-relative">
              <button type="button" class="btn btn-large bg-light position-absolute w-100 h-100 underline"></button>
              <button type="submit" name="tauolla" class="underline btn btn-large text-dark <?php echo $_SESSION['button_class3']; ?> position-relative z-index-1">Tauolla</button>
            </div>
            </form>
        </div>

        <div class="col-sm-3 tyontekijaRivi">
          <form method="POST" action="kaytettavyys.php">
            <div class="position-relative">
              <button type="button" class="btn btn-large bg-light position-absolute w-100 h-100 underline"></button>
              <button type="submit" name="poissa" class="underline btn btn-large text-dark <?php echo $_SESSION['button_class4']; ?> position-relative z-index-1">Poissa</button>
            </div>
          </form>
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