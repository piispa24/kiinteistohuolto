<?php require "header.php"; ?>
<div class="container-fluid col-sm-6 mt-5">
<h1>Kirjaudu sisään</h1>
</div>
<div class="container-fluid col-sm-6 bg-dark p-5 mt-5">
    <form action="###">
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Sähköposti:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
        <label for="pwd" class="form-label">Salasana:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    
    <button type="submit" class="btn btn-primary">Kirjaudu</button>
    </form>
</div>
<?php require "footer.php"; ?>