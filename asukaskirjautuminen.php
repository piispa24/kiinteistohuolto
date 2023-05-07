<?php 
require "header.php"; 
require "connect.php";
?>

<div class="container-fluid p-0 container-paneeli p-5">

<div id="kirjautuminenBg" class="container-fluid bg-light col-sm-6 p-5 login">
    
    <h1>Asukkaan kirjautuminen</h1>
    <?php
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $passwd = $_POST['password'];

            if (empty($email) || empty($passwd)) {
                echo '<div class="alert alert-danger">Väärä sähköposti tai salasana</div>';
            } else {
                $kirjaudu = $yhteys->prepare("SELECT * FROM asukas WHERE asukassposti = ?");
                $kirjaudu->execute([$email]);
                $user = $kirjaudu->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    if (password_verify($passwd, $user['asukassalasana'])) {
                        $_SESSION['sposti'] = $user['asukassposti'];
                        header("Location: vikailmoitusApp.php");
                        exit;
                    } else {
                        echo '<div class="alert alert-danger">Väärä sähköposti tai salasana</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Väärä sähköposti tai salasana</div>';
                }
            }
        }

        if(isset($_SESSION['sposti'])) {
            header("Location: index.php");
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
