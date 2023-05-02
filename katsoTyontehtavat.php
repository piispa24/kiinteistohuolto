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
$query = "SELECT *, asukas.asukasnimi, taloyhtio.taloyhtionnimi, tyontekija.tyontekijasposti FROM vikailmoitus INNER JOIN taloyhtio ON vikailmoitus.taloyhtionID = taloyhtio.taloyhtioID INNER JOIN asukas ON vikailmoitus.asukasID = asukas.asukasID INNER JOIN tyontekija ON vikailmoitus.tyontekijaID = tyontekija.tyontekijaID WHERE tyontekijasposti = :tyontekijasposti";
$stmt = $yhteys->prepare($query);
$stmt->bindParam(':tyontekijasposti', $email);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container p-5 m-5">
  <br>
  <p><a href=tyontekijaApp.php class="btn btn-success">Takaisin</a></p>
  <h3>Omat tiedot</h3>
  <br>
      
  <table class="table table-striped">
    <tr>
      <th>Taloyhtiö</th>
      <th>Huoneisto</th>
      <th>Ilmoittaja</th>
      <th>Otsikko</th>
      <th>Asia</th>
    </tr>
        
    <?php foreach ($results as $result): ?>
      <tr>                    
        <td><?php echo $result['taloyhtionnimi']; ?> </td>
        <td><?php echo $result['huoneisto']; ?> </td>
        <td><?php echo $result['asukasnimi']; ?> </td>
        <td><?php echo $result['vikaotsikko']; ?> </td>
        <td><?php echo $result['vikaasia']; ?> </td>
      </tr>
    <?php endforeach; ?>
                
  </table>
</div>

    </table>
   </div>
   

<?php require "footer.php"; ?>