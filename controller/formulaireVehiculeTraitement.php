<?php

require_once ("../model/exec.php");
require_once ("../model/query.php");
require_once ("../model/membre.php");
include("initBD.php");
session_start();

if(isset($_SESSION['membre'])){


	if(	isset($_POST["marque"]) && !empty($_POST["marque"]) &&
		isset($_POST["modele"]) && !empty($_POST["modele"]) &&
		isset($_POST["couleur"]) && !empty($_POST["couleur"]) &&
		isset($_POST["date"]) && !empty($_POST["date"])
		){
	
		$marque = htmlspecialchars($_POST["marque"]);
		$modele = htmlspecialchars($_POST["modele"]);
		$couleur = htmlspecialchars($_POST["couleur"]);
		$date = htmlspecialchars($_POST["date"]);			

		$exec = new Exec($myBase->getMyBase());

		$tab = array('vehicule'=>array('marque'=>$marque, 'modele'=>$modele, 'couleur'=>$couleur, 'dateService'=>$date));

		$query = $exec->createExecFromArray($tab);
		$exec->execBD($query);
		// echo "<pre>";
		// var_dump($query);
		// echo "</pre>";

		$tab = "INSERT INTO membre(idMembre, vehiculeID) VALUES('" . $_SESSION['membre']->getIdMembre(). "', '" . $myBase->getMyBase()->lastInsertId() . "') ON DUPLICATE KEY UPDATE vehiculeID=". $myBase->getMyBase()->lastInsertId();
		// echo "<pre>";
		// var_dump($tab);
		// echo "</pre>";

		$exec->execBD($tab);

		$_SESSION['membre']->setVehiculeID($myBase->getMyBase()->lastInsertId());
		
	    header('Location: messageAlerte.php?message=7');
	}
}
else {
		header('Location: messageAlerte.php?message=0');
}
