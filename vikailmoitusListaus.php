<?php 
require "header.php"; 
if(!isset($_SESSION['email'])){
  header("Location: kirjautuminen.php");
  exit;
}
?>

<div class="container mt-5">
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
      
  <div class="table-responsive">
   <table class="table table-striped">
      <tr>
         <th>Ilmoittaja</th>
         <th>Taloyhtiö</th>
         <th>Huoneisto</th>
         <th>Otsikko</th>
         <th>Sisältö</th>
         <th></th>
      </tr>
        
            <?php
              include("listaus.php");
             
              $viat = json_decode($JSON, true);

              if(count($viat) !=0){
                foreach($viat as $key){
                  foreach($key as $vika){
                    ?>
                    <tr>                    
                      <td><?php echo $vika['Asukasnimi']; ?> </td>
                      <td><?php echo $vika['Osoite']; ?> </td>
                      <td><?php echo $vika['Huoneisto']; ?> </td>
                      <td><?php echo $vika['Vikaotsikko']; ?> </td>
                      <td><?php echo $vika['Vikaasia']; ?> </td>
                      <td><p><a href="###" class="btn btn-warning">Kuittaa itselle</a></p></td>
                    </tr>
                    
                    <?php  
                  }
                }
              }
            ?>
            <th>Ilmoitusten lukumäärä:
                <?php
                    require "connect.php";

                    $haku = "SELECT * FROM vikailmoitus";
                    $rivit = $yhteys->query($haku);

                    print($rivit->rowCount());
                ?>
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
    </table>
  </div>
</div>

<?php require "footer.php"; ?>