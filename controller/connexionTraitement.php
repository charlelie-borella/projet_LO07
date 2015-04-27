<?php

require_once("../model/exec.php");
require_once("../model/query.php");
include("initBD.php");



//On vérifie que l'utilisateur n'est pas déjà connecté
if(!isset($_SESSION['membre'])){

	if(isset($_POST['mail'])){

		$mail = $_POST["mail"];
		$password = $_POST["password"];

		$myBase = new ConnexionBD("localhost", "root", "root", "covoiturage");
		$myBase->initConnect();

		$query = new Query($myBase->getMyBase());
		$myQuery = "SELECT * FROM membre WHERE mail='". $mail . "' AND password='". $password ."'" ;
		$res = $query->queryBD($myQuery);
		//var_dump($res);
	}


}


?>