<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php 
require "connect.php";
require "header.php"; 
?>

<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "Password or email missing";
      } else {
        $kirjaudu = $yhteys->prepare("SELECT * FROM asukas WHERE email = ?");
        $kirjaudu->execute([$email]);
        $user = $kirjaudu->fetch(PDO::FETCH_ASSOC);

        if(!$user) {
            // Jos ei löydy asukasta, katso työntekijät taulu
            $kirjaudu = $yhteys->prepare("SELECT * FROM tyontekija WHERE email = ? AND rooliID = 2");
            $kirjaudu->execute([$email]);
            $user = $kirjaudu->fetch(PDO::FETCH_ASSOC);
        }
        if(!$user) {
            // Jos ei löydy asukasta tai työntekijää, katso onko työnjohtaja
            $kirjaudu = $yhteys->prepare("SELECT * FROM tyontekija WHERE email = ? AND rooliID = 3");
            $kirjaudu->execute([$email]);
            $user = $kirjaudu->fetch(PDO::FETCH_ASSOC);
        }
        // Ohjaa roolin perusteella
        if($user) {
            if (isset($user['asukasID'])) {
                header("Location: asukasApp.php");
            } else if (isset($user['tyontekijaID']) && $user['rooliID'] == 2) {
                header("Location: tyontekijaApp.php");
            } else if (isset($user['tyontekijaID']) && $user['rooliID'] == 3) {
                header("Location: tyonjohtoApp.php");
            }
        }
      }
}

?>


<div class="container-fluid col-sm-6 mt-5">
<h1>Työntekijä kirjautuminen</h1>
</div>
<div id="kirjautuminenBg" class="container-fluid bg-light col-sm-6 p-5 mt-5">
    <form medhod="POST" action="">
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Sähköposti:</label>
        <input type="email" class="form-control" id="kirjautuminenEmail" placeholder="Enter email" name="email">
    </div>
    <div class="mb-4">
        <label for="password" class="form-label">Salasana:</label>
        <input type="password" class="form-control" id="kirjautuminenPsw" placeholder="Enter password" name="password">
    </div>
        <button type="submit" class="btn btn-success">Kirjaudu</button>
    </form>
</div>

<?php require "footer.php"; ?>