<?php 
session_start();
require "header.php"; 
require "connect.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
if(isset($_POST['submit'])) {
    $tyontekijasposti = $_POST['email'];
    $passwd = $_POST['password'];

    if (empty($tyontekijasposti) || empty($passwd)) {
        echo '<div class="alert alert-danger">Väärä sähköposti tai salasana</div>';
    } else {
        $komento = "SELECT * FROM tyontekija WHERE tyontekijasposti = '$tyontekijasposti' AND tyontekijasalasana = '$passwd' AND rooliID = 2";
        $kirjaudu = $yhteys->query($komento);
        $kirjaudu->execute();
        $data = $kirjaudu->fetch(PDO::FETCH_ASSOC);
        
        if ($data) {
            // user is authenticated, set session variable and redirect to the secure page
            $_SESSION['email'] = $tyontekijasposti;
            header('Location: tyontekijaApp.php');
            exit;
          } else {
            // authentication failed, show an error message
            echo '<div class="alert alert-danger">Väärä sähköposti tai salasana</div>';
          }
    }
}
if(isset($_SESSION['email'])) {
    header("location: index.php");
}
?>

<div class="container-fluid p-0 container-paneeli">
    <div id="kirjautuminenBg" class="container-fluid bg-light col-sm-6 p-5 login">
        <h1>Työntekijän kirjautuminen</h1>
            <form method="POST" action="kirjautuminen.php">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Sähköposti:</label>
                <input type="email" class="form-control" id="kirjautuminenEmail" placeholder="Enter email" name="email">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Salasana:</label>
                <input type="password" class="form-control" id="kirjautuminenPsw" placeholder="Enter password" name="password">
            </div>
                <button type="submit" class="btn btn-success" name="submit">Kirjaudu</button>
            </form>
    </div>
</div>

<?php require "footer.php"; ?>
