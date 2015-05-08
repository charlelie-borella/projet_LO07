<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/profil.php");
require_once("../view/foot.php");


require_once("../model/membre.php");//Il faut inclure la classe pour accéder au membre
require_once("../model/query.php");
include("initBD.php");

session_start();
$file = basename(__FILE__);     

if(isset($_SESSION['membre'])) {

	$html= headerSite("Votre profil");
	$html.= menu($file);

	//Partie "Votre profil"
	$idMembre = $_SESSION['membre']->getIdMembre();
	$prnm = $_SESSION['membre']->getPrnom();	
	$nom = $_SESSION['membre']->getNom();
	$dateNais = $_SESSION['membre']->getDateNais();
	$mail = $_SESSION['membre']->getMail();
	$tel = $_SESSION['membre']->getTel();
	$mdp = $_SESSION['membre']->getPassword();
	$photo = $_SESSION['membre']->getPhotoProfil();

	$query = new Query($myBase->getMyBase());
	$requeteAVG = "SELECT AVG(note) as AVG
				FROM voyage v, commentaire c, trajet t 
				WHERE t.idTrajet = v.idTrajet AND
				(v.commentaireConducteur = c.idCommentaire AND v.idPassager =" . $idMembre . ") OR
				(v.commentairePassager = c.idCommentaire AND t.conducteurID =" . $idMembre . ")";
	
	$query->queryBD($requeteAVG);
	$resAVG = $query->recoverQueryInArray();

	$note = round($resAVG[0]['AVG'], 1, PHP_ROUND_HALF_DOWN);

	$query = new Query($myBase->getMyBase());
	$myQuery = "SELECT solde FROM compte WHERE idCompte=" . $_SESSION['membre']->getCompteID();
	$query->queryBD($myQuery);
	$resSolde = $query->recoverQueryInArray();

	$solde = $resSolde[0]['solde'];
	
	$html.= contenu($prnm);
	$html.=profil($photo, $prnm, $nom, $dateNais, $mail, $tel, $mdp, $note);
	$html.=solde($solde);

	if($_SESSION['membre']->getVehiculeID() != null){	
	//Requête pour récupérer le véhicule du membre
		$query = new Query($myBase->getMyBase());
		$myQuery = "SELECT modele, marque, dateService, couleur FROM membre, vehicule WHERE membre.vehiculeID = vehicule.idVehicule AND idMembre=" . $_SESSION['membre']->getIdMembre();
		$query->queryBD($myQuery);

		$res = $query->recoverQueryInArray();

	
		$modele= $res[0]["modele"];
		$marque= $res[0]["marque"];
		$annee= date_format(new DateTime($res[0]["dateService"]), 'd/m/Y');
		$html.=vehicule($modele, $couleur="", $marque, $annee);
	}
	else{

	}

	$html.= foot();

	echo $html;
	 
} 
else { 
	header('Location: messageAlerte.php?message=1');
}




