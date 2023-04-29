<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">


    <title>Kiinteistöhuolto</title>
  </head>
  <body>
    <nav class="sticky-top navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <p class="navbar-brand" href="#">Kiinteistöhuolto Piispanen & Lönnberg</p>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Etusivu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="yhteystiedot.php">Yhteystiedot</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="referenssit.php">Referenssit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Ota yhteyttä</a>
          </li>

          <?php if(!isset($_SESSION['email']) && !isset($_SESSION['sposti']) && !isset($_SESSION['isannsposti']) && !isset($_SESSION['tyojohtoemail'])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Kirjautuminen
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