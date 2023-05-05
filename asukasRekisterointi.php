<?php
require "header.php"; 
require "connect.php";

if(!isset($_SESSION['isannsposti'])){
  header("Location: isankirjautuminen.php");
  exit;
}
?>

<?php

// Hakee isännöitsijän isannoitsijaIDn tietokannasta
$email = $_SESSION['isannsposti']; // Valitsee isännöitsijän session
$query = "SELECT isannoitsija.isannoitsijaID, taloyhtio.taloyhtioID, taloyhtio.taloyhtionnimi, taloyhtio.talotyyppiID, taloyhtio.osoite 
            FROM isannoitsija 
            INNER JOIN taloyhtio ON isannoitsija.taloyhtioID = taloyhtio.taloyhtioID 
            WHERE isannoitsija.isannoitsijasposti = :isannoitsijasposti";

$haku = $yhteys->prepare($query);
$haku->bindParam(':isannoitsijasposti', $email);
$haku->execute();
$result = $haku->fetch(PDO::FETCH_ASSOC);

// Esitäytä formin kentät
$taloyhtioID = $result['taloyhtioID'];
$taloyhtionnimi = $result['taloyhtionnimi'];

if(isset($_POST['submit'])){
  if($_POST['nimi'] == '' OR $_POST['rooli'] == '' OR $_POST['email'] == '' OR $_POST['password'] == '' OR $_POST['puhelin'] == '' OR $_POST['taloyhtio'] == '' OR $_POST['huoneisto'] == ''){
    echo "Vaaditut kentät ovat tyhjiä";
  }else{
    $nimi = $_POST['nimi'];
    $rooli = $_POST['rooli'];
    $email = $_POST['email'];
    $salasana = $_POST['password'];
    $puhelin = $_POST['puhelin'];
    $taloyhtio = $_POST['taloyhtio'];
    $huoneisto = $_POST['huoneisto'];

    $lisays = "INSERT INTO asukas (asukasnimi, rooliID, asukassposti, asukassalasana, asukaspuhnro, taloyhtioID, huoneisto) VALUES (:asukasnimi, :rooliID, :asukassposti, :asukassalasana, :asukaspuhnro, :taloyhtioID, :huoneisto)";
    $lisaa = $yhteys->prepare($lisays);
    $lisaa->execute([
      ':asukasnimi' => $nimi, 
      ':rooliID' => $rooli,
      ':asukassposti' => $email,
      ':asukassalasana' => password_hash($salasana, PASSWORD_DEFAULT),
      ':asukaspuhnro' => $puhelin, 
      ':taloyhtioID' => $taloyhtio,
      ':huoneisto' => $huoneisto,
    ]);
    header("Location: isannoitsijaApp.php");
  }
}

?>

<main class="form-signin m-auto">

  <form class="bg-light mt-3 p-5 mb-5 inputBg" method="POST" action="asukasRekisterointi.php">
    <!-- Vie takaisin isännöitsijän appiin -->
    <?php if(isset($_SESSION['isannsposti'])): ?>
      <p><a href=isannoitsijaApp.php class="btn btn-success">Takaisin</a></p>
  <?php endif; ?>
  <h1 class="h3 mb-3 fw-normal text-center">Lisää asukas taloyhtiöön <?php echo $taloyhtionnimi?></h1>
    <div class="form-floating">
      <input name="nimi" type="text" class="form-control inputSarake mb-2" id="floatingInput">
      <label for="floatingInput">Asukasnimi</label>
    </div>
    <div class="form-floating">
      <input name="rooli" type="hidden" class="form-control inputSarake mb-2" id="floatingInput" value="1">
      <label for="floatingInput">Rooli</label>
    </div>
    <div class="form-floating">
      <input name="email" type="email" class="form-control inputSarake mb-2" id="floatingInput">
      <label for="floatingInput">Sähköpostiosoite</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control inputSarake mb-2" id="floatingPassword">
      <label for="floatingPassword">Salasana</label>
    </div>
    <div class="form-floating">
      <input name="puhelin" type="text" class="form-control inputSarake mb-2" id="floatingInput">
      <label for="floatingPassword">Puhelinnumero</label>
    </div>
    <div class="form-floating">
      <input name="taloyhtio" value="<?php echo $taloyhtioID; ?>" placeholder="PIILOTETAAN MYÖHEMMIN" type="text" class="form-control inputSarake mb-2" id="floatingInput">
      <label for="floatingInput">PIILOTETAAN MYÖHEMMIN</label>
    </div>
    <div class="form-floating">
      <input name="huoneisto" type="text" class="form-control inputSarake mb-2" id="floatingInput">
      <label for="floatingInput">Huoneisto</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-success" type="submit">Lisää asukas</button>
    

  </form>
</main>
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