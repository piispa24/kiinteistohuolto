<?php require "header.php"; ?>

<div class="container">
        <br>
      <h3>Vikailmoitukset</h3>
      <br>
      
   <table class="table table-striped">
      <tr>
         <th>Ilmoittaja</th>
         <th>Osoite</th>
         <th>Vikaotsikko</th>
         <th>Vika asia</th>
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
                      <td><?php echo $vika['Vikaotsikko']; ?> </td>
                      <td><?php echo $vika['Vikaasia']; ?> </td>
                      <td><p><a href="###" class="btn btn-warning">Siirrä omalle listalle</a></p> </td>
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

<?php require "footer.php"; ?>