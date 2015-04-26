<?php

require_once ("exec.php");
require_once ("user.php");
require_once ("query.php");


$nom = $_POST["nom"];
$prnm = $_POST["prnm"];
$email = $_POST["email"];
$password = $_POST["password"];


// $first_name= "test";
// $password = "test";

	$myBase = new Connexion("localhost", "root", "root", "covoiturage");
	$myBase->initConnect();