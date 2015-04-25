<?php

try //appelle de BDD
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=localhost;dbname=guesswho','root', '', $pdo_options);
}

catch(Exception $e) //capture du message d'erreur en cas d'erreur
{
	die('Error: '.$e->getMessage());
}

?>