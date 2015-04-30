<?php

require_once("../view/administration/header.php");
require_once("../view/administration/menu.php");
require_once("../view/administration/foot.php");
require_once("../view/administration/gestionCompteAdministration.php");
require_once("../model/admin.php");
require_once("../model/membre.php");
require_once("../model/query.php");
include("initBD.php");
session_start();


$file = basename(__FILE__);     

$html= headerSite("gestion compte");
$html.= menu($file);


if($_SESSION['admin']){


	$query = new Query($myBase->getMyBase());
	$myQuery = "SELECT * FROM membre";
	$query->queryBD($myQuery);
	$res = $query->recoverQueryInArray();

	// echo "<pre>";
	// var_dump($res);
	// echo "</pre>";

	$listeMembre = array();

	foreach ($res as $key => $value) {

		$listeMembre[] = new membre($value['idMembre'], $value['nom'], $value['prnm'], $value['password'], $value['adresse'], $value['cp'], $value['ville'], $value['pays'], $value['tel'], $value['mail'], $value['note'], $value['photoProfil'], $value['dateNais'], $value['vehiculeID'], $value['compteID']);

	}

	$html.= deb();

	foreach ($listeMembre as $key => $value) {
		
		$photo = $value->getPhotoProfil();
		$nom = $value->getNom();
		$prnm = $value->getPrnom();
		$mail = $value->getMail();
		$tel = $value->getTel();
		$date = $value->getDateNais();
		
		$html.=affichageListeCompte($photo, $nom, $prnm, $date, $mail, $tel);
	}

	
	$html.=fin();
}




//$html.= foot();

echo $html;
        
      