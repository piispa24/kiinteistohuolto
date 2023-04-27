<?php require "header.php"; ?>

<div class="container">
    <div class="container-fluid col-sm- mt-3 ">
    <h4>Ota yhteys täyttämällä lomake ja sinuun ollaan yhteydessä</h4>
    </div>
    <div id="contactBg" class="container mt-5 bg-light p-5">
        <h5>Yhteystiedot:</h5>
        <form id="yhteydenottoLomake" action="###">
        <div class="mb-1">
            <label for="nimi" class="form-label"></label><br>
            <input type="text" class="form col-sm-4" id="yhteysNimi" placeholder="Nimesi" name="nimi">
        </div>
        <div class="mb-1 mt-1">
            <label for="email" class="form-label"></label><br>
            <input type="text" class="form col-sm-4" id="yhteysEmail" placeholder="Sähköposti" name="email">
        </div>
        <div class="mb-5 mt-1">
            <label for="puhnro" class="form-label"></label><br>
            <input type="text" class="form col-sm-4" id="yhteysPuhelinnro" placeholder="Puhelin numero" name="puhnro">
        </div>  
        <h5>Asia:</h5>  
        <div class="mb-1 mt-4">
            <label for="otsikko" class="form-label"></label>
            <input type="text" class="form col-sm-4" id="yhteysOtsikko" placeholder="Otsikko (Esim. Tarjouspyyntö)" name="otsikko">
        </div>
        <div class="mb-3 mt-3">
            <label for="asia" class="form-label"></label>
            <textarea class="form-control" id="yhteysAsia" placeholder="Asia" name="Asia" rows="5"></textarea>
        </div>
        
        <button id="yhteysBtn" type="submit" class="btn btn-success mt-3">Ota yhteyttä</button>
        </form>
    </div>
</div>


<?php require "footer.php"; ?>