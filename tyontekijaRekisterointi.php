<?php require "header.php"; ?>
<?php require "connect.php"; ?>

<?php
if(!isset($_SESSION['tyojohtoemail'])){
  header("Location: tyokirjautuminen.php");
  exit;
}

if(isset($_POST['submit'])){
  if($_POST['nimi'] == '' OR $_POST['puhelin'] == '' OR $_POST['email'] == '' OR $_POST['password'] == '' OR $_POST['kaytettavyys'] == '' OR $_POST['rooli'] == ''){
    echo "Vaaditut kentät ovat tyhjiä";
  }else{
    $nimi = $_POST['nimi'];
    $puhelin = $_POST['puhelin'];
    $email = $_POST['email'];
    $salasana = $_POST['password'];
    $kaytettavyys = $_POST['kaytettavyys'];
    $rooli = $_POST['rooli'];

    $lisays = "INSERT INTO tyontekija (tyontekijanimi, tyontekijapuhnro, tyontekijasposti, tyontekijasalasana, kaytettavyysID, rooliID) VALUES (:tyontekijanimi, :tyontekijapuhnro, :tyontekijasposti, :tyontekijasalasana, :kaytettavyysID, :rooliID)";
    $lisaa = $yhteys->prepare($lisays);
    $lisaa->execute([
      ':tyontekijanimi' => $nimi, 
      ':tyontekijapuhnro' => $puhelin, 
      ':tyontekijasposti' => $email,
      ':tyontekijasalasana' => password_hash($salasana, PASSWORD_DEFAULT),
      ':kaytettavyysID' => $kaytettavyys,
      ':rooliID' => $rooli,
    ]);
    header("Location: tyonjohtoApp.php");
  }
}

?>

<main class="form-signin m-auto">

  <form class="bg-light p-3 inputBg mt-3" method="POST" action="tyontekijaRekisterointi.php">
  <h3 class="h3 fw-normal text-center">Lisää työntekijä</h3>
  <p><a href=tyonjohtoApp.php class="btn btn-success">Takaisin</a></p>
    <div class="form-floating">
      <input name="nimi" type="text" class="form-control inputSarake mb-2" id="floatingInput">
      <label for="floatingInput">Nimi</label>
    </div>
    <div class="form-floating">
      <input name="puhelin" type="text" class="form-control inputSarake mb-2" id="floatingInput">
      <label for="floatingPassword">Puhelinnumero</label>
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
      <input name="kaytettavyys" type="hidden" class="form-control inputSarake mb-2" id="floatingInput" value="3">
      <label for="floatingPassword">Käytettävyys</label>
    </div>
    <div class="form-floating">
      <input name="rooli" type="text" class="form-control inputSarake mb-2" id="floatingInput" value="2">
      <label for="floatingInput">Rooli (1=Asukas 2=Työntekijä 3=Työnjohtaja 4=Isännöitsijä)</label>
    </div>
    

    <button name="submit" class="w-100 btn btn-lg btn-success" type="submit">Lisää työntekijä</button>
    

  </form>
</main>
<?php require "footer.php"; ?>