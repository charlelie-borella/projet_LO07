<?php

require_once("../model/query.php");
require_once("../model/admin.php");
include("initBD.php");

session_start();

//On vérifie que l'utilisateur n'est pas déjà connecté
if(!isset($_SESSION['admin'])){
	if(isset($_POST['mail']) && isset($_POST['password'])){

		$mail = htmlspecialchars($_POST["mail"]);
		$password = md5($_POST["password"]);

		$query = new Query($myBase->getMyBase());
		$myQuery = "SELECT * FROM admin WHERE mail='". $mail . "' AND password='". $password ."'" ;
		$query->queryBD($myQuery);
		$res = $query->recoverQueryInArray();
		//var_dump($res);

		if(count($res)==0){
			header('Location: ../messageAlerte.php?message=1'); 	
		}else{
			$admin = new Admin($res[0]['idAdmin'], $res[0]['mail']);

			$_SESSION['admin'] = $admin;
			//var_dump($_SESSION['membre']->getPhotoProfil());
			//var_dump($_SESSION['membre']->getNom());	
			header('Location: gestionCompteAdministration.php');
		}

		
	}
}
else{
	header('Location: ../messageAlerte.php?message=3');
}