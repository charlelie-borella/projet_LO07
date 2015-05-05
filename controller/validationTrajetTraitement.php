<?php 

require_once("../model/query.php");
require_once("../model/membre.php");
include("initBD.php");

session_start();

if(isset($_SESSION['membre']) && isset($_POST['idTrajet']) && isset($_POST['prix']) )
{

	$idTrajet = htmlspecialchars($_POST["idTrajet"]);
	$prix = htmlspecialchars($_POST["prix"]);

	$idMembre = $_SESSION["membre"]->getIdMembre();

	$query = new Query($myBase->getMyBase());
	$changerEtat = "UPDATE trajet SET etat = 1 WHERE idTrajet = " . $idTrajet; 
	$res = $query->queryBD($changerEtat);

	$myQuery = "SELECT idPassager, compteID FROM voyage v, membre m WHERE v.idPassager = m.idMembre AND idTrajet=" . $idTrajet;
	$query->queryBD($myQuery);
	$res = $query->recoverQueryInArray();

	$listeIdPassager = array();

		foreach ($res as $key => $value) {
			if($value["idPassager"] != $idMembre ){
				$listeIdPassager[$value["idPassager"]] = $value["compteID"];
			}		
		}

	foreach ($listeIdPassager as $key => $value) {

			//Enlève la somme passager
			$queryArgent = new Query($myBase->getMyBase());
			$requeteEnleverArgent = "UPDATE compte SET solde = solde - $prix WHERE idCompte = " . $value; 
			$queryArgent->queryBD($requeteEnleverArgent);
			
			//Ajoute 10 euros au passager
			$requeteAjouterArgent = "UPDATE compte SET solde = solde + $prix WHERE idCompte = " . intval($_SESSION['membre']->getCompteID()); 			
			$queryArgent->queryBD($requeteAjouterArgent);
		}

	

	header('Location: messageAlerte.php?message=13');

}else{

	header('Location: messageAlerte.php?message=1');
}