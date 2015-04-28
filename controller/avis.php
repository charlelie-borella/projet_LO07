<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../model/voyage.php");
require_once("../model/trajet.php");
require_once("../view/avis.php");
require_once("../model/exec.php");
require_once("../model/query.php");
require_once("../view/foot.php");
require_once("../model/membre.php"); //Il faut inclure la classe pour accéder au membre

session_start();

$html= headerSite("Vos avis");
$html.= menu();
$html.=nav();


// Avis reçus


$html.=AvisR($idCommentaire, $satisfaction, $commentaire, $conduite, $date);


if(isset($_SESSION['avis'])) {
foreach ($_SESSION['avis'] as $key => $value) {

		$idCommentaire = $value->getIdCommentaire();
		$satisfaction = $value->getNoteParcours();
		$commentaire = $value->getCommentaire();
		$conduite = $value->getNoteConduite();
		$date = $value->getDate();

	$idCommentaire = $_SESSION['avis'][0]->getIdCommentaire();
	$satisfaction = $_SESSION['avis'][0]->getNoteParcours();	
	$commentaire = $_SESSION['avis'][0]->getCommentaire();
	$conduite = $_SESSION['avis'][0]->getNoteConduite();
	$date = $_SESSION['avis'][0]->getDate();

	}

	//$html.= fin();
}


// Avis laissés


	$html.=AvisL($idCommentaire, $satisfaction, $commentaire, $conduite, $date);

if(isset($_SESSION['avis'])){
foreach ($_SESSION['avis'] as $key => $value) {

		$idCommentaire = $value->getIdCommentaire();
		$satisfaction = $value->getNoteParcours();
		$commentaire = $value->getCommentaire();
		$Conduite = $value->getNoteConduite();
		$date = $value->getDate();

	$idCommentaire = $_SESSION['avis'][0]->getIdCommentaire();
	$satisfaction = $_SESSION['avis'][0]->getNoteParcours();	
	$commentaire = $_SESSION['avis'][0]->getCommentaire();
	$conduite = $_SESSION['avis'][0]->getNoteConduite();
	$date = $_SESSION['avis'][0]->getDate();
	}

	//$html.= fin();
}
$html.= fin();
$html.= foot();

echo $html;