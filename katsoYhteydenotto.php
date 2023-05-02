<?php 
session_start();
require "header.php"; 
?>

<div class="container mt-5 p-3">
        <br>
      <h3>Yhteydenotot</h3>
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
                      <!--Delete button poistaa yhteydenoton-->
                      <td><?php echo '<a href="deleteYhteydenotto.php?YhteysID='.$vika['YhteydenottoID'].'" class="btn btn-danger">Poista</a>'; ?></td>
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