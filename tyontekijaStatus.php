<?php require "header.php"; ?>

<div class="container">
        <br>
      <h3>Työntekijän status</h3>
      <br>
      
   <table class="table table-striped">
      <tr>
         <th>Työntekijä</th>
         <th>Puhelin</th>
         <th>Status</th>
      </tr>
        
            <?php
              include("tyontekijaListaus.php");
             
              $viat = json_decode($JSON, true);

              if(count($viat) !=0){
                foreach($viat as $key){
                  foreach($key as $vika){
                    ?>
                    <tr>                    
                      <td><?php echo $vika['Tyontekijanimi']; ?> </td>
                      <td><?php echo $vika['Tyontekijapuhnro']; ?> </td>
                      <td><?php echo $vika['Kaytettavyys']; ?> </td>
                    </tr>
                    
                    <?php  
                  }
                }
              }
            ?>
    </table>
   </div>

<?php require "footer.php"; ?>