<?php require "header.php"; ?>

<div class="container">
    <div class="container-fluid col-sm-8 mt-5">
    <h3>Tee vikailmoitus yhtiöön ########</h3>
    </div>
    <div class="container-fluid bg-dark col-sm-8 p-5 mt-5">
        <form id=vika action="###">
        <div class="mb-3 mt-3">
            <label for="otsikko" class="form-label">Otsikko:</label>
            <input type="text" class="form-control" id="vikailmoitusOtsikko" placeholder="otsikko" name="otsikko">
        </div>
        <div class="mb-3">
            <label for="asia" class="form-label">Mitä vikailmoitus koskee:</label>
            <textarea class="form-control" id="vikailmoitusAsia" placeholder="Asia" name="vikailmoitusAsia" rows="5"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Lähetä vikailmoitus</button>
        </form>
    </div>
</div>
<?php require "footer.php"; ?>
