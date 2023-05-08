<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="img/company.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" type="image/png" href="img/testi11.png">

    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <title>Kiinteistöhuolto</title>
  </head>
  <body>
    <div class=" bg-danger">
      <div class="ylarivi">Päivystys 24h 050 2223 344 • paivystys @ kiinteistohuolto.com</div>
    </div>
    <nav class="sticky-top navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a href="index.php"> <img id="logo" src="img/testi11.png"></a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">ETUSIVU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="yhteystiedot.php">YHTEYSTIEDOT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="referenssit.php">MEISTÄ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">OTA YHTEYTTÄ</a>
          </li>

          <?php if(!isset($_SESSION['email']) && !isset($_SESSION['sposti']) && !isset($_SESSION['isannsposti']) && !isset($_SESSION['tyojohtoemail'])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              KIRJAUTUMINEN
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="asukaskirjautuminen.php">Asukas</a></li>
              <li><a class="dropdown-item" href="isankirjautuminen.php">Isännöitsijä</a></li>
              <li><a class="dropdown-item" href="kirjautuminen.php">Työntekijä</a></li>
              <li><a class="dropdown-item" href="tyokirjautuminen.php">Työnjohto</a></li>
            </ul>
          </li>

        <?php else : ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <!--If else; jos sposti on asetettu, näytetään sposti ja jos ei, niin näytetään email-->  
            <?php echo isset($_SESSION['isannsposti']) ? $_SESSION['isannsposti'] : (isset($_SESSION['tyojohtoemail']) ? $_SESSION['tyojohtoemail'] : (isset($_SESSION['sposti']) ? $_SESSION['sposti'] : $_SESSION['email'])); ?>
            </a>
            <ul class="dropdown-menu">
              <!-- Valitsee alasvetovalikkoon sovelluksen kirjautujan mukaan -->
              <?php if(isset($_SESSION['isannsposti'])): ?>
                <li><a class="dropdown-item" href="isannoitsijaApp.php">Isännöitsijäpaneeli</a></li>
              <?php endif; ?>
              <?php if(isset($_SESSION['tyojohtoemail'])): ?>
                <li><a class="dropdown-item" href="tyonjohtoApp.php">Työnjohtopaneeli</a></li>
              <?php endif; ?>
              <?php if(isset($_SESSION['sposti'])): ?>
                <li><a class="dropdown-item" href="vikailmoitusApp.php">Asukaspaneeli</a></li>
              <?php endif; ?>
              <?php if(isset($_SESSION['email'])): ?>
                <li><a class="dropdown-item" href="tyontekijaApp.php">Työntekijäpaneeli</a></li>
              <?php endif; ?>
              <li><a class="dropdown-item" href="logout.php">Kirjaudu ulos</a></li>
            </ul>
          </li>
          
        <?php endif; ?>
        </li>
        </ul>
      </div>
    </div>
  </nav>