<?php

require_once ("../model/exec.php");
require_once ("../model/query.php");
require_once ("../model/membre.php");
include("initBD.php");
session_start();

if(isset($_SESSION['membre'])){

	if(	isset($_POST["idTrajet"]) && !empty($_POST["idTrajet"]) &&
		isset($_POST["dateTrajet"]) && !empty($_POST["dateTrajet"]) &&
		isset($_POST["villeDep"]) && !empty($_POST["villeDep"]) &&
		isset($_POST["villeAr"]) && !empty($_POST["villeAr"])){

		$idTrajet = htmlspecialchars($_POST["idTrajet"]);
		$dateTrajet = htmlspecialchars($_POST["dateTrajet"]);
		$villeDep = htmlspecialchars($_POST["villeDep"]);
		$villeAr = htmlspecialchars($_POST["villeAr"]);

		$query = new Query($myBase->getMyBase());
		$myQuery = "SELECT idPassager, compteID FROM voyage v, membre m WHERE v.idPassager = m.idMembre AND idTrajet=" . $idTrajet;
		$query->queryBD($myQuery);
		$res = $query->recoverQueryInArray();

		// echo "<pre>";
		// var_dump($res);
		// echo "</pre>";

		$listeIdPassager = array();

		foreach ($res as $key => $value) {

			$listeIdPassager[$value["idPassager"]] = $value["compteID"];
		}


		$myQuerySup = "DELETE FROM trajet WHERE idTrajet=" . $idTrajet;
		$query->queryBD($myQuerySup);


		
		$exec = new Exec($myBase->getMyBase());

		$message = "Votre trajet du " . $dateTrajet . " de " . $villeDep . " à " . $villeAr . " a été annulé";

		foreach ($listeIdPassager as $key => $value) {

			//Envoie un message au passager
			$tab = array('message'=>array('proprietaireID'=>$_SESSION['membre']->getIdMembre(), 'destinataireID'=>$key, 'message'=>$message));
			$query = $exec->createExecFromArray($tab);
			$exec->execBD($query);

			//Enleve 10 euro au membre
			$queryArgent = new Query($myBase->getMyBase());
			$requeteEnleverArgent = "UPDATE compte SET solde = solde - 10 WHERE idCompte = " . $value; 
			$queryArgent->queryBD($requeteEnleverArgent);
			
			//Ajoute 10 euros au passager
			$requeteAjouterArgent = "UPDATE compte SET solde = solde + 10 WHERE idCompte = " . intval($_SESSION['membre']->getCompteID()); 

			
			$queryArgent->queryBD($requeteAjouterArgent);


		}
		
	    header('Location: messageAlerte.php?message=11');
	}
}
else {
		header('Location: messageAlerte.php?message=0');
}
