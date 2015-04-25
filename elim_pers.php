<?php
session_start();
include("bdd.php");
$prenom_pers_elim = $_POST['pers'];
$id_game = $_POST['id_game'];
$login_user = $_SESSION['login_user'];

$bdd->query("UPDATE pnj SET statut_character = 0 WHERE nom='$prenom_pers_elim' AND id_game='$id_game' AND id_user!='$login_user' ");

header("Location: game_play.php?id_game=$id_game");