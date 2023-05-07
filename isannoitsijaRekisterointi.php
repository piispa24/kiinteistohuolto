<?php require "header.php"; ?>
<?php require "connect.php"; ?>

<?php
if(!isset($_SESSION['tyojohtoemail'])){
  header("Location: tyokirjautuminen.php");
  exit;
}

if(isset($_POST['submit'])){
  if($_POST['nimi'] == '' OR $_POST['puhelin'] == '' OR $_POST['email'] == '' OR $_POST['password'] == '' OR $_POST['rooli'] == '' OR $_POST['taloyhtioID'] == ''){
    echo "Vaaditut kentät ovat tyhjiä";
  }else{
    $nimi = $_POST['nimi'];
    $puhelin = $_POST['puhelin'];
    $email = $_POST['email'];
    $salasana = $_POST['password'];
    $rooli = $_POST['rooli'];
    $taloyhtio = $_POST['taloyhtioID'];

    $lisays = "INSERT INTO isannoitsija (isannoitsijanimi, isannoitsijapuh, isannoitsijasposti, isannoitsijasalasana, rooliID, taloyhtioID) 
    VALUES (:isannoitsijanimi, :isannoitsijapuh, :isannoitsijasposti, :isannoitsijasalasana, :rooliID, :taloyhtioID)";
    $lisaa = $yhteys->prepare($lisays);
    $lisaa->execute([
      ':isannoitsijanimi' => $nimi, 
      ':isannoitsijapuh' => $puhelin, 
      ':isannoitsijasposti' => $email,
      ':isannoitsijasalasana' => password_hash($salasana, PASSWORD_DEFAULT),
      ':rooliID' => $rooli,
      ':taloyhtioID' => $taloyhtio,
    ]);
    header("Location: tyonjohtoApp.php");
  }
}
?>

<main class="form-signin m-auto">

  <form class="bg-light p-3 inputBg mt-3" method="POST" action="isannoitsijaRekisterointi.php">
  <h3 class="h3 fw-normal text-center">Lisää isännöitsijä</h3>
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
      <input name="rooli" type="hidden" class="form-control inputSarake mb-2" id="floatingInput" value="4">
      <label for="floatingInput">Rooli</label>
    </div>
    <div class="form-floating">
      <input name="taloyhtioID" type="text" class="form-control inputSarake mb-2" id="floatingInput">
      <label for="floatingInput">TaloyhtiöID</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-success" type="submit">Lisää isännöitsijä</button>

  </form>
</main>
<?php require "footer.php"; ?>