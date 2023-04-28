<?php require "header.php"; ?>

<?php require "connect.php"; ?>

<?php

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

<main class="form-signin w-50 m-auto">
  <h1 class="h3 mt-5 fw-normal text-center">Lisää asukas</h1>
  <form class="bg-light p-5 inputBg" method="POST" action="asukasRekisterointi.php">

    <div class="form-floating">
      <input name="nimi" type="text" class="form-control inputSarake mb-2" id="floatingInput">
      <label for="floatingInput">Asukasnimi</label>
    </div>
    <div class="form-floating">
      <input name="rooli" type="text" class="form-control inputSarake mb-2" id="floatingInput" value="1">
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
      <input name="taloyhtio" type="text" class="form-control inputSarake mb-2" id="floatingInput">
      <label for="floatingInput">Taloyhtiö (1=Viiriäinen)</label>
    </div>
    <div class="form-floating">
      <input name="huoneisto" type="text" class="form-control inputSarake mb-2" id="floatingInput">
      <label for="floatingInput">Huoneisto</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-success" type="submit">Lisää asukas</button>
    

  </form>
</main>
<?php require "footer.php"; ?>