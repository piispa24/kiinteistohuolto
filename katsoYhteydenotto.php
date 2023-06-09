<?php 
require "header.php"; 

if(!isset($_SESSION['tyojohtoemail'])){
  header("Location: tyokirjautuminen.php");
  exit;
}
?>

<div class="container mt-5">
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
      
<div class="table-responsive">
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