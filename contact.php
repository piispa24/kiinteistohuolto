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

<div class="container-fluid container-index vh-100 p-5">
    <div class="container-fluid">
        
        <div id="contactBg" class="container bg-light p-5 col-sm-6">
            <h5>Yhteystiedot:</h5>
            <form id="yhteydenottoLomake" method="POST" action="contact.php">
            <div class="mb-1">
                <label for="nimi" class="form-label"></label><br>
                <input type="text" class="form col-sm-12 inputSarake" id="yhteysNimi" placeholder="Nimesi" name="nimi">
            </div>
            <div class="mb-1 mt-1">
                <label for="email" class="form-label"></label><br>
                <input type="text" class="form col-sm-12 inputSarake" id="yhteysEmail" placeholder="Sähköposti" name="email">
            </div>
            <div class="mb-5 mt-1">
                <label for="puhnro" class="form-label"></label><br>
                <input type="text" class="form col-sm-12 inputSarake" id="yhteysPuhelinnro" placeholder="Puhelin numero" name="puhnro">
            </div>  
            <h5>Asia:</h5>  
            <div class="mb-1 mt-3">
                <label for="otsikko" class="form-label"></label>
                <input type="text" class="form col-sm-12 inputSarake" id="yhteysOtsikko" placeholder="Otsikko (Esim. Tarjouspyyntö)" name="otsikko">
            </div>
            <div class="mb-3 mt-3">
                <label for="asia" class="form-label"></label>
                <textarea type="text" class="form inputSarake col-sm-12" id="yhteysAsia" placeholder="Asia" name="asia" rows="5"></textarea>
            </div>
            
            <button name="talleta" id="yhteysBtn" type="submit" class="btn btn-success mt-3">Lähetä yhteydenotto</button>
            </form>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>