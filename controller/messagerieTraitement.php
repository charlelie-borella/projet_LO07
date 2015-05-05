<?php

require_once ("../model/exec.php");;
require_once ("../model/membre.php");
include("initBD.php");

session_start();

if(isset($_SESSION['membre'])){

	if(	isset($_POST["idPassager"]) && !empty($_POST["idPassager"]) &&
		isset($_POST["message"]) && !empty($_POST["message"]) ){

		$idPassager = htmlspecialchars($_POST["idPassager"]);
		$message = htmlspecialchars($_POST["message"]);
		

		
		$exec = new Exec($myBase->getMyBase());
		$tab = array('message'=>array('destinataireID'=>$idPassager, 'proprietaireID'=>$_SESSION['membre']->getIdMembre(), 'message'=>$message));
		$query = $exec->createExecFromArray($tab);
		$exec->execBD($query);
				
		
		header('Location: messageAlerte.php?message=12');
	}
	else{
	header('Location: messageAlerte.php?message=0');
}
}
else{
	header('Location: messageAlerte.php?message=3');
}


