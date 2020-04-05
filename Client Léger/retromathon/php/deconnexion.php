<?php

session_start();

$_SESSION['prenom'] = "";
$_SESSION['nom'] = "";
$_SESSION["login"] = "";
$_SESSION["mdp"] = "";
$_SESSION["active"] = false;

header('Location: http://localhost/retromathon/index.php');
exit();

?>
