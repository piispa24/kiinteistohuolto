<?php require "header.php"; ?>
<?php require "connect.php"; ?>
<?php

    if(isset($_POST['talleta'])){
        $nimi = $_POST['nimi'];
        $email = $_POST['email'];
        $puhnro = $_POST['puhnro'];
        $otsikko = $_POST['otsikko'];
        $asia = $_POST['asia'];

        $kysely = "INSERT INTO yhteydenotto (yhtnimi, yhtotsikko, yhtasia, yhtpuhnro, yhtsposti) VALUES (:yhtnimi, :yhtotsikko, :yhtasia, :yhtpuhnro, :yhtsposti)";

        $lisaa = $yhteys->prepare($kysely);
        $lisaa->bindValue(':yhtnimi', $nimi, PDO::PARAM_STR);
        $lisaa->bindValue(':yhtotsikko', $otsikko, PDO::PARAM_STR);
        $lisaa->bindValue(':yhtasia', $asia, PDO::PARAM_STR);
        $lisaa->bindValue(':yhtpuhnro', $puhnro, PDO::PARAM_STR);
        $lisaa->bindValue(':yhtsposti', $email, PDO::PARAM_STR);
        $lisaa->execute();
        
        header("location:index.php");
    }
    

?>

<div class="container-fluid container-index vh-100 p-3">
    <div class="container-fluid">
        
        <div id="contactBg" class="container bg-light p-3 mt-5 col-sm-6">
            <h3 class="mb-4">Yhteydenottolomake</h3>
            <h5>Yhteystiedot:</h5>
            <form id="yhteydenottoLomake" method="POST" action="contact.php">
            <div class="mb-1">
                <label for="nimi" class="form-label"></label><br>
                <input type="text" class="form col-sm-12 inputSarake" id="yhteysNimi" placeholder="Koko nimi" name="nimi">
            </div>
            <div class="mb-1 mt-1">
                <label for="email" class="form-label"></label><br>
                <input type="text" class="form col-sm-12 inputSarake" id="yhteysEmail" placeholder="Sähköpostiosoite" name="email">
            </div>
            <div class="mb-4 mt-1">
                <label for="puhnro" class="form-label"></label><br>
                <input type="text" class="form col-sm-12 inputSarake" id="yhteysPuhelinnro" placeholder="Puhelinnumero" name="puhnro">
            </div>  
            <h5>Yhteydenoton sisältö:</h5>  
            <div class="">
                <label for="otsikko" class="form-label"></label>
                <input type="text" class="form col-sm-12 inputSarake" id="yhteysOtsikko" placeholder="Otsikko (esim. Tarjouspyyntö)" name="otsikko">
            </div>
            <div class="mb-3 mt-2">
                <label for="asia" class="form-label"></label>
                <textarea type="text" class="form inputSarake col-sm-12" id="yhteysAsia" placeholder="Asia" name="asia" rows="4"></textarea>
            </div>
            
            <button name="talleta" id="yhteysBtn" type="submit" class="btn btn-success mt-2">Lähetä yhteydenotto</button>
            </form>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>