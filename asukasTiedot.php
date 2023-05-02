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

<div class="container p-5 m-5">
        <br>
        <p><a href=vikailmoitusApp.php class="btn btn-success">Takaisin</a></p>
      <h3>Omat tiedot</h3>
      <br>
      
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
   

<?php require "footer.php"; ?>