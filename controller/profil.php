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

$html= headerSite("Votre profil");
$html.= menu($file);


//Partie "Votre profil"
if(isset($_SESSION['membre'])) {

	$membre = $_SESSION['membre']->getPrnom();
	
	$nom = $_SESSION['membre']->getNom();
	$dateNais = $_SESSION['membre']->getDateNais();
	$mail = $_SESSION['membre']->getMail();
	$tel = $_SESSION['membre']->getTel();
	$mdp = $_SESSION['membre']->getPassword();
	$photo = $_SESSION['membre']->getPhotoProfil();
	
	$html.= contenu($membre);
	$html.=profil($photo, $nom, $dateNais, $mail, $tel, $mdp);

	if(isset($_SESSION['vehicule'])) {

	//Requête pour récupérer le véhicule du membre
	$query = new Query($myBase->getMyBase());
	$myQuery = "SELECT modele, marque, dateService, couleur FROM membre, vehicule WHERE membre.vehiculeID = vehicule.idVehicule AND idMembre=" . $_SESSION['membre']->getIdMembre();
	$query->queryBD($myQuery);
	// echo "<pre>";
	// var_dump($query);
	// echo "</pre>";
	$res = $query->recoverQueryInArray();

 
//echo "<pre>";
//var_dump($res);
//echo "</pre>";
	if($res != null){
		$modele= $res[0]["modele"];
		$marque= $res[0]["marque"];
		$annee= date_format(new DateTime($res[0]["dateService"]), 'd/m/Y');
		$html.=vehicule($modele, $marque, $annee);
	}else{
		$html.=vehicule($modele="", $marque="", $annee="");
	}
	
	


	$modele= $res[0]["modele"];
	$marque= $res[0]["marque"];
	$annee= date_format(new DateTime($res[0]["dateService"]), 'd/m/Y');
	$couleur=$res[0]['couleur'];
	$html.=vehicule($modele, $marque, $annee, $couleur);
} 
else { 


	$html.="
	<div class='thumbnail'>
		<h3 class='media-heading'>Votre véhicule</h3><br />
		Enregistrez votre véhicule lorsque vous proposez votre premier trajet !
	</div>";
	}

} 
else { 
	$html.= "Vous devez vous connecter."; 
}




$html.= foot();

echo $html;