<?php session_start();
require "header.php"; 
require "connect.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
if(isset($_POST['submit'])) {
    $isannoitsijasposti = $_POST['email'];
    $passwd = $_POST['password'];
    
    $komento = "SELECT * FROM isannoitsija WHERE isannoitsijasposti = '$isannoitsijasposti' AND isannoitsijasalasana = '$passwd'";
    $kirjaudu = $yhteys->query($komento);
    $kirjaudu->execute();
    $data = $kirjaudu->fetch(PDO::FETCH_ASSOC);
    
    if ($data) {
        // user is authenticated, set session variable and redirect to the secure page
        $_SESSION['isannsposti'] = $isannoitsijasposti;
        header('Location: isannoitsijaApp.php');
        exit;
      } else {
        // authentication failed, show an error message
        echo 'Invalid email or password';
      }
}

if(isset($_SESSION['isannsposti'])) {
    header("location: index.php");
  }
?>


<div class="container-fluid col-sm-6 mt-5">
</div>
<div id="kirjautuminenBg" class="container-fluid bg-light col-sm-6 p-5 mt-5">
<h1>Isännöitsijän kirjautuminen</h1>
    <form method="POST" action="isankirjautuminen.php">
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

<?php require "footer.php"; ?>
