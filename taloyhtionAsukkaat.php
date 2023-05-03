<?php require "header.php";
require "connect.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!isset($_SESSION['isannsposti'])){
    header("Location: isankirjautuminen.php");
    exit;
  }
 ?>

<div class="container mt-5">
        <br>
        <p><a href=isannoitsijaApp.php class="btn btn-success">Takaisin</a></p>
      <h3>Taloyhtiön asukkaat</h3>
      <br>
      
  <div class="table-responsive">
  <table class="table table-striped">
      <tr>
         <th>AsukasID</th>
         <th>Asukasnimi</th>
         <th>Puhelinnumero</th>
         <th>Asukassposti</th>
         <th>Huoneisto</th>
         <th>Taloyhtiö</th>
      </tr>
        
            <?php
              include("asukasListausIsannointi.php");
             
              $asukkaat = json_decode($JSON, true);

              if(count($asukkaat) !=0){
                foreach($asukkaat as $key){
                  foreach($key as $asukas){
                    ?>
                    <tr>                    
                    <td><?php echo $asukas['AsukasID']; ?> </td>
                    <td><?php echo $asukas['Asukasnimi']; ?> </td>
                    <td><?php echo $asukas['Asukaspuhnro']; ?> </td>
                    <td><?php echo $asukas['Asukassposti']; ?> </td>
                    <td><?php echo $asukas['Huoneisto']; ?> </td>
                    <td><?php echo $asukas['Taloyhtiö']; ?> </td>
                    </tr>
                    
                    <?php  
                  }
                }
              }
            ?>
    </table>
  </div>

   </div>

<?php require "footer.php"; ?>