<?php
session_start();

$_SESSION['connexion'] = false;//permet la déconnexion

$_SESSION['login_user'] = ''; //permet de réinitialiser le login utilisateur

header("Location: acceuil.php"); //redirection
?>