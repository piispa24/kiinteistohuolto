<?php require "header.php"; ?>

<div class="container">
    <div class="container-fluid col-sm- mt-5">
    <h4>Ota yhteys täyttämällä lomake ja sinuun ollaan yhteydessä</h4>
    </div>
    <div class="container-fluid col-sm- p-5 mt-5">
        <form id="yhteydenottoLomake" action="###">
        <div class="mb-3 mt-3">
            <label for="nimi" class="form-label"></label><br>
            <input type="text" class="form col-sm-4" id="yhteysNimi" placeholder="Nimesi" name="nimi">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label"></label><br>
            <input type="text" class="form col-sm-4" id="yhteysEmail" placeholder="Sähköposti" name="email">
        </div>
        <div class="mb-5 mt-3">
            <label for="puhnro" class="form-label"></label><br>
            <input type="text" class="form col-sm-4" id="yhteysPuhelinnro" placeholder="Puehlin numero" name="puhnro">
        </div>    
        <div class="mb-3 mt-3">
            <label for="otsikko" class="form-label">Otsikko:</label>
            <input type="text" class="form-control" id="yhteysOtsikko" placeholder="Otsikko (Esim. Tarjouspyyntö)" name="otsikko">
        </div>
        <div class="mb-3">
            <label for="asia" class="form-label">Mitä yhteydenotto koskee:</label>
            <textarea class="form-control" id="yhteysAsia" placeholder="Asia" name="Asia" rows="5"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Ota yhteyttä</button>
        </form>
    </div>
</div>


<?php require "footer.php"; ?>