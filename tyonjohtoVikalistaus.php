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
                        <div class="dropdown">
                            <a class="btn btn-default dropdown-toggle" href="#" id="navbarDropdownMenuLink<?php echo $vika['VikailmoitusID']; ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $vika['Tyontekijanimi']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink<?php echo $vika['VikailmoitusID']; ?>">
                                <?php
                                require "connect.php";
                                // Hae työntekijä db
                                $query = "SELECT tyontekijanimi FROM tyontekija";
                                $result = $yhteys->query($query);
                                // Tee jokaiselle oma li elementti
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<li class="dropdown-item" onclick="updateEmployee(\'' . $row['tyontekijanimi'] . '\', ' . $vika['VikailmoitusID'] . ')">' . $row['tyontekijanimi'] . '<input type="hidden" name="tyontekijaID" value="' . $row['tyontekijaID'] . '"></li>';
                                }
                                ?>
                            </ul>
                        </div>

                            <script>
                                function updateEmployee(name, id) {
                                    document.getElementById("navbarDropdownMenuLink" + id).innerHTML = name;
                                    document.getElementById("selectedTyontekijaID").value = id;
                                }
                            </script>
                        </td>
                        <td><?php echo '<a href="siirraTehtava.php?tyontekijaID='.$vika['tyontekijaID'].'" class="btn btn-warning">Siirrä Tehtävä</a>'; ?></td>
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