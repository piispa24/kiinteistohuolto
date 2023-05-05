<?php 
require "header.php"; 
require "connect.php";
?>

<div class="container-fluid p-0 container-paneeli p-5">

<div id="kirjautuminenBg" class="container-fluid bg-light col-sm-6 p-5 login">
    
    <h1>Asukkaan kirjautuminen</h1>
    <?php
        if(isset($_POST['submit'])) {
            $asukassposti = $_POST['email'];
            $passwd = $_POST['password'];

            if (empty($asukassposti) || empty($passwd)) {
                echo '<div class="alert alert-danger">Väärä sähköposti tai salasana</div>';
            } else {
                $komento = "SELECT * FROM asukas WHERE asukassposti = '$asukassposti' AND asukassalasana = '$passwd'";
                $kirjaudu = $yhteys->query($komento);
                $kirjaudu->execute();
                $data = $kirjaudu->fetch(PDO::FETCH_ASSOC);

                if ($data) {
                    // user is authenticated, set session variable and redirect to the secure page
                    $_SESSION['sposti'] = $asukassposti;
                    header('Location: vikailmoitusApp.php');
                    exit;
                } else {
                    // authentication failed, show an error message
                    echo '<div class="alert alert-danger">Väärä sähköposti tai salasana</div>';
                }
            } 
        }

        if(isset($_SESSION['sposti'])) {
            header("location: index.php");
        }
        ?>
    <form method="POST" action="asukaskirjautuminen.php">
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
