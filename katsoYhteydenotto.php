<?php 
session_start();
require "header.php"; 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);?>

<div class="container">
        <br>
      <h3>Vikailmoitukset</h3>
      <br>
      <!--Näyttää tyonjohtoappiin vievän napin kun sessio on tyojohtoemail-->
      <?php if(isset($_SESSION['tyojohtoemail'])): ?>
        <p><a href=tyonjohtoApp.php class="btn btn-success">Takaisin</a></p>
      <?php endif; ?>
            <!--Näyttää tyontekijäappiin vievän napin kun sessio on email-->
      <?php if(isset($_SESSION['email'])): ?>
        <p><a href=tyontekijaApp.php class="btn btn-success">Takaisin</a></p>
      <?php endif; ?>
      
   <table class="table table-striped">
      <tr>
         <th>Ilmoittajan nimi</th>
         <th>Puhelin</th>
         <th>Sähköposti</th>
         <th>Otsikko</th>
         <th>Asia</th>
         <th></th>
      </tr>
        
            <?php
              include("yhteydenottoListaus.php");
             
              $viat = json_decode($JSON, true);

              if(count($viat) !=0){
                foreach($viat as $key){
                  foreach($key as $vika){
                    ?>
                    <tr>                    
                      <td><?php echo $vika['Yhtnimi']; ?> </td>
                      <td><?php echo $vika['Yhtpuhnro']; ?> </td>
                      <td><?php echo $vika['Yhtsposti']; ?> </td>
                      <td><?php echo $vika['Yhtotsikko']; ?> </td>
                      <td><?php echo $vika['Yhtasia']; ?> </td>
                      <td><p><a href="###" class="btn btn-danger">Poista</a></p> </td> 
                    </tr>
                    
                    <?php  
                  }
                }
              }
            ?>
            <th>Ilmoitusten lukumäärä:
                <?php
                    require "connect.php";

                    $haku = "SELECT * FROM yhteydenotto";
                    $rivit = $yhteys->query($haku);

                    print($rivit->rowCount());
                ?>
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
    </table>
   </div>

<?php require "footer.php"; ?>