<?php 
require "header.php";
if(!isset($_SESSION['tyojohtoemail'])){
  header("Location: tyokirjautuminen.php");
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
         <th>Osoite</th>
         <th>Vikaotsikko</th>
         <th>Vika asia</th>
         <th>Työntekijä</th>
         <th></th>
      </tr>
        
            <?php
              include("listausTyonjohtoTesti.php");
             
              $viat = json_decode($JSON, true);

              if(count($viat) !=0){
                foreach($viat as $key){
                  foreach($key as $vika){
                    ?>
                    
                    <tr>                    
                    <td><?php echo $vika['Asukasnimi']; ?> </td>
                    <td><?php echo $vika['Osoite']; ?> </td>
                    <td><?php echo $vika['Vikaotsikko']; ?> </td>
                    <td><?php echo $vika['Vikaasia']; ?> </td>
                    <td>
                    <form method="post" action="paivitaTyontekija.php">
                      <input type="hidden" name="VikailmoitusID" value="<?php echo $vika['VikailmoitusID']; ?>">
                      <select name="Tyontekijanimi" onchange="this.form.submit()">
                          <?php
                              require "connect.php";
                              $query = "SELECT TyontekijaID, tyontekijanimi FROM tyontekija";
                              $result = $yhteys->query($query);
                              
                              
                              echo '<option value="" ' . ($vika['Tyontekijanimi'] === null ? 'selected' : '') . '>NULL</option>';
                              
                            
                              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                  $selected = ($row['tyontekijanimi'] == $vika['Tyontekijanimi']) ? "selected" : "";
                                  echo '<option value="' . $row['tyontekijanimi'] . '" ' . $selected . '>' . $row['tyontekijanimi'] . '</option>';
                              }
                          ?>
                      </select>
                  </form>







                  </td>
                  <td>
                      
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
            <th></th>
    </table>
  </div>
 
   </div>

<?php require "footer.php"; ?>