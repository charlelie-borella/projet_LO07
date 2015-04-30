<?php

require_once("../view/administration/header.php");
require_once("../view/administration/menu.php");
require_once("../view/administration/foot.php");
require_once("../view/administration/ficheDescriptifTrajetAdministration.php");
require_once("../model/admin.php");
require_once("../model/membre.php");
require_once("../model/query.php");
require_once("../model/Trajet.php");

include("initBD.php");
session_start();


$page = basename(__FILE__);     

$html= headerSite("gestion compte");
$html.= menu($page);



if(isset($_SESSION['admin']) && isset($_POST['idTrajet']) ){

	$date=$_POST['date'];
	$villeDep=$_POST['villeDep'];
	$villeAr=$_POST['villeAr'];

	$html.=titre($date, $villeDep, $villeAr);

	$query = new Query($myBase->getMyBase());
	$myQuery = "SELECT nom, prnm, mail FROM membre WHERE idMembre = ". $_POST['idConducteur'];
	$query->queryBD($myQuery);
	$res = $query->recoverQueryInArray();

	$nom = $res[0]["nom"];
	$prnm = $res[0]["prnm"];
	$mail = $res[0]["mail"];
	
	$html.=debConduc("Conducteur");
	$html.=ficheConduc($nom, $prnm, $mail);
	$html.=fin();


	$query = new Query($myBase->getMyBase());
	$myQuery = "SELECT idPassager FROM voyage WHERE idTrajet = ". $_POST['idTrajet'];
	$query->queryBD($myQuery);
	$res = $query->recoverQueryInArray();

	$listePassager = array();

	foreach ($res as $key => $value) {

		$listePassager[] = $value;
	}


	$listeObjectPassager=array();
	//recherche du nombre de personne déjà inscrite à un trajet
	foreach ($listePassager as $key => $value) {
		
		$query2 = new Query($myBase->getMyBase());
		$myQuery2 = "SELECT * FROM membre WHERE idMembre =". $value['idPassager'];
		$resQuery = $query2->queryBD($myQuery2);
		


		foreach ($resQuery as $key => $value) {
			if($value['idMembre'] !== $_POST['idConducteur'])
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
		
		$html.=ficheConduc($nom, $prnm, $mail);
	}

	$html.=fin();

}




//$html.= foot();

echo $html;
        
      


