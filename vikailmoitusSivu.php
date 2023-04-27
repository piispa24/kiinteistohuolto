<?php require "header.php"; ?>

<div class="container">
    <div class="container-fluid col-sm- mt-3 ">
    <h4>Tee vikailmoitus yhtiöön #####</h4>
    </div>
    <div id="vikaBg" class="container mt-5 bg-light p-5">
        <h5>Asia:</h5>  
        <div class="mb-1 mt-4">
            <label for="otsikko" class="form-label"></label>
            <input type="text" class="form col-sm-4" id="vikaOtsikko" placeholder="Otsikko (Esim. Vuotava hana)" name="otsikko">
        </div>
        <div class="mb-3 mt-3">
            <label for="asia" class="form-label"></label>
            <textarea class="form-control" id="vikaAsia" placeholder="Asia" name="Kerro asiasta tarkemmin" rows="5"></textarea>
        </div>
        
        <button id="yhteysBtn" type="submit" class="btn btn-success mt-3">Lähetä vikailmoitus</button>
        </form>
    </div>
</div>


<?php require "footer.php"; ?>
