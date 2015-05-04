<?php
//Page récupère les informations de annonces.php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/foot.php");
require_once("../view/ficheDescriptifTrajet.php");

require_once("../model/admin.php");
require_once("../model/membre.php");
require_once("../model/query.php");
require_once("../model/Trajet.php");

include("initBD.php");
session_start();

//Permet de retourner le nom de la page
$page = basename(__FILE__);     

$html= headerSite("gestion compte");
$html.= menu($page);

// SI les varaibles membre & idTrajet existent
if(isset($_SESSION['membre']) && isset($_POST['idTrajet'])){

	//$date=$_POST['date'];
	//$villeDep=$_POST['villeDep'];
	//$villeAr=$_POST['villeAr'];

	//$html.=titre($date, $villeDep, $villeAr);
	//On récupère tous les idPassager d'un voyage pour un trajet
	// $query = création d'un nouvel objet pour faire une requête dans la BD
	$query = new Query($myBase->getMyBase());
	// La requête
	$myQuery = "SELECT idPassager, idVoyage FROM voyage WHERE idTrajet = ". $_POST['idTrajet'];
	//Va faire la requête
	$query->queryBD($myQuery);
	//Permet de récupérer la requête sous forme de tableau
	$res = $query->recoverQueryInArray();

	$listePassager = array();
	//
	foreach ($res as $key => $value) {	
		$listePassager[$value['idPassager']] = $value['idVoyage'];
	}


	$listeObjectPassager=array();

	//recherche du nombre de personne déjà inscrite à un trajet
	foreach ($listePassager as $key => $value) {
		
		$query2 = new Query($myBase->getMyBase());
		$myQuery2 = "SELECT * FROM membre WHERE idMembre =". $key;
		$resQuery = $query2->queryBD($myQuery2);
		
		foreach ($resQuery as $key => $value) {
			if($value['idMembre'] !== $_SESSION['membre']->getIdMembre())
			{
				$listeObjectPassager[] = new membre($value['idMembre'], $value['nom'], $value['prnm'], "", $value['adresse'], $value['cp'], $value['ville'], $value['pays'], $value['tel'], $value['mail'], $value['note'], $value['photoProfil'], $value['dateNais'], $value['vehiculeID'], $value['compteID']);
			}
			
		}
	}

	// echo "<pre>";
	// 	print_r($listeObjectPassager);
	// echo "</pre>";

	$html.=debConduc("Passager");
	foreach ($listeObjectPassager as $key => $value) {
		
		$nom = $value->getNom();
		$prnm = $value->getPrnom();
		$mail = $value->getMail();
		$idPassager = $value->getIdMembre();
		$idVoyage = $listePassager[$idPassager];
		
		$html.=ficheConduc($nom, $prnm, $mail, $idPassager, $idVoyage);
	}

	$html.=fin();

}

//$html.= foot();

echo $html;
        
      


