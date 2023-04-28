<?php require "header.php"; ?>

<div class="container-fluid col-sm-6 mt-5">
<h1>Työntekijä kirjautuminen</h1>
</div>
<div id="kirjautuminenBg" class="container-fluid bg-light col-sm-6 p-5 mt-5">
    <form medhod="POST" action="###">
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Sähköposti:</label>
        <input type="email" class="form-control" id="kirjautuminenEmail" placeholder="Enter email" name="email">
    </div>
    <div class="mb-4">
        <label for="password" class="form-label">Salasana:</label>
        <input type="password" class="form-control" id="kirjautuminenPsw" placeholder="Enter password" name="password">
    </div>
        <button type="submit" class="btn btn-success">Kirjaudu</button>
    </form>
</div>

<?php require "footer.php"; ?>