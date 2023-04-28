<?php require "includes/header.php"; ?>

<?php require "connect.php"; ?>

<?php
if(isset($_SESSION['sposti'])){
  header("location: index.php");
}

if(isset($_POST['submit'])){
  if($_POST['email'] == '' OR $_POST['password'] == ''){
    echo "Täytä vaadittavat tiedot";
  }else{
    $sposti = $_POST['email'];
    $salasana = $_POST['password'];

    $komento = "SELECT * FROM kayttajat WHERE sposti = '$sposti'";
    $kirjaudu = $yhteys->query($komento);
    $kirjaudu->execute();
    $data = $kirjaudu->fetch(PDO::FETCH_ASSOC);
    if($kirjaudu->rowCount() > 0){
      if(password_verify($salasana, $data['salasana'])){
        //echo "Olet kirjautunut";
        $_SESSION['sposti'] = $data['sposti'];
        header(("location: index.php"));

      }else{
        echo "Sähköposti tai salasana on väärin";
      }
    }else{
      echo "Sähköposti tai salasana on väärin";
    }
  }
}

?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="login.php">
    <!-- <img class="mb-4 text-center" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mt-5 fw-normal text-center">Ole hyvä ja kirjaudu</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Sähköpostiosoite</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Salasana</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Kirjaudu</button>
    <h6 class="mt-3">Jos sinulla ei ole käyttäjätunnusta  <a href="register.php">Luo tunnus</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>