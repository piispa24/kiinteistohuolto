<?php require "header.php"; ?>


<div id="vikaBg" class="container mt-5 bg-light p-5">
<h4>Tee vikailmoitus yhtiöön #####</h4>
    <h5 class="mt-3">Otsikko:</h5>  
    <div class="mb-1">
        <label for="otsikko" class="form-label"></label>
        <input type="text" class="form col-sm-4" id="vikaOtsikko" placeholder="(Esim. Vuotava hana)" name="otsikko">
    </div>
    <h5 class="mt-3">Asia:</h5>  
    <div class="mb-3">
        <label for="asia" class="form-label"></label>
        <textarea class="form-control" id="vikaAsia" placeholder="" name="Kerro asiasta tarkemmin" rows="5"></textarea>
    </div>
    
    <button id="yhteysBtn" type="submit" class="btn btn-success mt-3">Lähetä vikailmoitus</button>
    </form>
</div>



<?php require "footer.php"; ?>
