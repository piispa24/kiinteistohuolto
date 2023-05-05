<?php session_start();
require "connect.php";
require "header.php"; 
if(!isset($_SESSION['sposti'])){
  header("Location: asukaskirjautuminen.php");
  exit;
}

?>
<?php
// Hakee asukkaan tiedot tietokannasta
$email = $_SESSION['sposti']; // Valitsee asukkaan session
$query = "SELECT *, taloyhtio.taloyhtionnimi FROM asukas INNER JOIN taloyhtio ON asukas.taloyhtioID = taloyhtio.taloyhtioID WHERE asukassposti = :asukassposti";
$stmt = $yhteys->prepare($query);
$stmt->bindParam(':asukassposti', $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$asukasID = $result['asukasnimi'];
$asukaspuhnro = $result['asukaspuhnro'];
$asukassposti = $result['asukassposti'];
$taloyhtionimi = $result['taloyhtionnimi'];
$huoneisto = $result['huoneisto'];
?>

<div class="container mt-5">
        <br>
        <p><a href=vikailmoitusApp.php class="btn btn-success">Takaisin</a></p>
      <h3>Omat tiedot</h3>
      <br>
  <div class="table-responsive">
  <table class="table table-striped">
      <tr>
         <th>Nimi</th>
         <th>Puhelin</th>
         <th>Sähköposti</th>
         <th>Osoite</th>
         <th>Huoneisto</th>
      </tr>
      <?php
        ?>
        <tr>                    
          <td><?php echo $asukasID; ?> </td>
          <td><?php echo $asukaspuhnro; ?> </td>
          <td><?php echo $asukassposti; ?> </td>
          <td><?php echo $taloyhtionimi; ?> </td>
          <td><?php echo $huoneisto; ?> </td>
        </tr>
      <?php  
        ?>
    </table>
  </div>
</div>

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