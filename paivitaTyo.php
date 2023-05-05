<?php
session_start();
require "connect.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION['email'])){
    header("Location: kirjautuminen.php");
    exit;
}

if(isset($_POST['kuittaa'])) {
$vikaID = $_POST['vikailmoitusID'];
$tyontekijaID = $_POST['TyontekijaID'];

$kysely = "UPDATE vikailmoitus SET tyontekijaID = :TyontekijaID WHERE vikailmoitusID = :VikailmoitusID";

$lisaa = $yhteys->prepare($kysely);
$lisaa->bindValue(':TyontekijaID', $tyontekijaID, PDO::PARAM_INT);
$lisaa->bindValue(':VikailmoitusID', $vikaID, PDO::PARAM_INT);
$lisaa->execute();

header('Location: vikailmoitusListaus.php');
exit();
}
?>

