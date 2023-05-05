<?php 
session_start();
require "header.php"; 

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
         <th>Työntekijä</th>
         <th></th>
      </tr>
            
      
            <?php
            require "connect.php";
  
            $email = $_SESSION['email']; // Valitsee isännöitsijän session
            $query = "SELECT * FROM tyontekija WHERE tyontekija.tyontekijasposti = :tyontekijasposti";

            $haku = $yhteys->prepare($query);
            $haku->bindParam(':tyontekijasposti', $email);
            $haku->execute();
            $result = $haku->fetch(PDO::FETCH_ASSOC);

            $tyontekijaID = $result['tyontekijaID'];
            ?>
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
                      <td><?php echo $vika['Tyontekijanimi']; ?> </td>
                      <td>
                        <form method="post" action="paivitaTyo.php">
                          <input type="hidden" name="vikailmoitusID" value="<?php echo $vika['VikailmoitusID']; ?>">
                          <input type="hidden" name="TyontekijaID" value="<?php echo $tyontekijaID; ?>">
                          <button type="submit" name="kuittaa" class="btn btn-warning">Kuittaa itselle</button>
                        </form>
                      </td>
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
            <th></th>
    </table>
  </div>
</div>

<?php require "footer.php"; ?>