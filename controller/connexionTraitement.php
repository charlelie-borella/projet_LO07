<?php

require_once("../model/query.php");
require_once("../model/membre.php");
include("initBD.php");

session_start();

//On vérifie que l'utilisateur n'est pas déjà connecté
if(!isset($_SESSION['membre'])){
	if(isset($_POST['mail']) && isset($_POST['password'])){

		$mail = htmlspecialchars($_POST["mail"]);
		$password = md5($_POST["password"]);

		$query = new Query($myBase->getMyBase());
		$myQuery = "SELECT * FROM membre WHERE mail='". $mail . "' AND password='". $password ."'" ;
		$query->queryBD($myQuery);
		$res = $query->recoverQueryInArray();
		//var_dump($res);

		if(count($res)==0){
			header('Location: messageAlerte.php?message=1'); 	
		}else{
			$membre = new membre($res[0]['idMembre'], $res[0]['nom'], $res[0]['prnm'], $res[0]['password'], $res[0]['adresse'], $res[0]['cp'], $res[0]['ville'], $res[0]['pays'], $res[0]['tel'], $res[0]['mail'], $res[0]['note'], $res[0]['photoProfil'], $res[0]['dateNais'], $res[0]['vehiculeID'], $res[0]['compteID']);

			$_SESSION['membre'] = $membre;
			//var_dump($_SESSION['membre']->getPhotoProfil());
			//var_dump($_SESSION['membre']->getNom());	
			header('Location: messageAlerte.php?message=2');
		}

		
	}
}
else{
	header('Location: messageAlerte.php?message=3');
}