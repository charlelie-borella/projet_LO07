<?php

require_once ("../model/exec.php");
require_once ("../model/query.php");
require_once ("../model/membre.php");
include("initBD.php");
session_start();


// SI l'utilisateur est connecté 
if(isset($_SESSION['membre'])){
// SI l'on a les données suivantes :
	if(	isset($_POST["note"]) && !empty($_POST["note"]) &&
		isset($_POST["commentaire"]) && !empty($_POST["commentaire"]) &&
		isset($_POST["idVoyage"]) && !empty($_POST["idVoyage"])
		){
	
		$note = htmlspecialchars($_POST["note"]);
		$commentaire = htmlspecialchars($_POST["commentaire"]);
		$idVoyage = htmlspecialchars($_POST["idVoyage"]);			

		$exec = new Exec($myBase->getMyBase());

		$tab = array('commentaire'=>array('note'=>$note, 'commentaire'=>$commentaire));

		$query = $exec->createExecFromArray($tab);
		$exec->execBD($query);
		// echo "<pre>";
		// var_dump($query);
		// echo "</pre>";

		//var_dump($myBase->getMyBase()->lastInsertId());
		// var_dump($_POST["idVoyage"]);
		// var_dump($idVoyage);
		// var_dump($myBase->getMyBase()->lastInsertId());

		$tab = "INSERT INTO voyage(idVoyage, commentaireID) VALUES('" . $idVoyage . "', '" . $myBase->getMyBase()->lastInsertId() . "') ON DUPLICATE KEY UPDATE commentaireID=". $myBase->getMyBase()->lastInsertId();
		// echo "<pre>";
		// var_dump($tab);
		// echo "</pre>";

		$exec->execBD($tab);
		
		header('Location: messageAlerte.php?message=9');
	}
}
else{
header('Location: messageAlerte.php?message=0');	
}

