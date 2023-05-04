<?php session_start();
require "connect.php";
require "header.php"; 
if(!isset($_SESSION['email'])){
  header("Location: kirjautuminen.php");
  exit;
}

?>
<?php
$email = $_SESSION['email'];
$query = "SELECT *, asukas.asukasnimi, taloyhtio.taloyhtionnimi, tyontekija.tyontekijasposti 
FROM vikailmoitus 
INNER JOIN taloyhtio 
ON vikailmoitus.taloyhtionID = taloyhtio.taloyhtioID 
INNER JOIN asukas ON vikailmoitus.asukasID = asukas.asukasID 
INNER JOIN tyontekija ON vikailmoitus.tyontekijaID = tyontekija.tyontekijaID 
WHERE tyontekijasposti = :tyontekijasposti";

$stmt = $yhteys->prepare($query);
$stmt->bindParam(':tyontekijasposti', $email);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
  <br>
  <p><a href=tyontekijaApp.php class="btn btn-success">Takaisin</a></p>
  <h3>Omat tehtävät</h3>
  <br>

  <div class="table-responsive">
    <table class="table table-striped">
      <tr>
        <th>Taloyhtiö</th>
        <th>Huoneisto</th>
        <th>Ilmoittaja</th>
        <th>Otsikko</th>
        <th>Asia</th>
        <th></th>
      </tr>
      <?php foreach ($results as $result): ?>
        <tr>                    
          <td><?php echo $result['taloyhtionnimi']; ?> </td>
          <td><?php echo $result['huoneisto']; ?> </td>
          <td><?php echo $result['asukasnimi']; ?> </td>
          <td><?php echo $result['vikaotsikko']; ?> </td>
          <td><?php echo $result['vikaasia']; ?> </td>
          <td><?php echo '<a href="paivitaRatkaisu.php?vikailmoitusID='.$result['vikailmoitusID'].'" class="btn btn-success">Ratkaisu</a>'; ?></td>
        </tr>
      <?php endforeach; ?>                 
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