<?php

require_once ("../model/exec.php");
require_once ("../model/query.php");
include("initBD.php");

if(!isset($_SESSION['membre'])){

	if(	isset($_POST["nom"]) && !empty($_POST["nom"]) &&
		isset($_POST["prnm"]) && !empty($_POST["prnm"]) &&
		isset($_POST["mail"]) && !empty($_POST["mail"])  &&
		isset($_POST["tel"]) && !empty($_POST["tel"])  &&
		isset($_POST["password"]) && !empty($_POST["password"]) &&
		isset($_POST["jour"]) && !empty($_POST["jour"]) &&
		isset($_POST["mois"]) && !empty($_POST["mois"]) &&
		isset($_POST["annee"]) && !empty($_POST["annee"])){

		$password = md5($_POST["password"]);
		$nom = htmlspecialchars($_POST["nom"]);
		$tel = htmlspecialchars($_POST["tel"]);
		$mail = htmlspecialchars($_POST["mail"]);
		$prnm = htmlspecialchars($_POST["prnm"]);
		$date = htmlspecialchars($_POST["annee"])."-".htmlspecialchars($_POST["mois"])."-".htmlspecialchars($_POST["jour"]);		
		$photo = "";

		if(isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])){
			$nomOrigine = $_FILES['photo']['name'];
			$elementsChemin = pathinfo($nomOrigine);
			$extensionFichier = $elementsChemin['extension'];
			$extensionsAutorisees = array("jpeg", "jpg", "png", "gif");
			if (!(in_array($extensionFichier, $extensionsAutorisees))) {
			    //echo "Le fichier n'a pas l'extension attendue";
			} else {    
			    // Copie dans le repertoire du script avec un nom
			    // incluant l'heure a la seconde pres 
			    $repertoireDestination = dirname(__FILE__)."/content/photoProfil/";
			    $nomDestination = "profil_".$mail.".".$extensionFichier;
			    $photo = "/content/photoProfil/" .$nomDestination;
			    if (move_uploaded_file($_FILES["photo"]["tmp_name"], 
			                                     $repertoireDestination.$nomDestination)) {
			        // echo "Le fichier temporaire ".$_FILES["photo"]["tmp_name"].
			        //         " a été déplacé vers ".$repertoireDestination.$nomDestination;
			    } else {
			        // echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
			        //         "Le déplacement du fichier temporaire a échoué".
			        //         " vérifiez l'existence du répertoire ".$repertoireDestination;
			    }
			}
		}

		$exec = new Exec($myBase->getMyBase());
		$tab = array('compte'=>array('solde'=>0));
		$query = $exec->createExecFromArray($tab);
		$exec->execBD($query);
		

		$exec = new Exec($myBase->getMyBase());

		$tab = array('membre'=>array('nom'=>$nom, 'dateNais'=>$date,'prnm'=>$prnm, 'mail'=>$mail, 'tel'=>$tel, 'photoProfil'=>$photo, 'password'=>$password, 'compteID'=>$myBase->getMyBase()->lastInsertId()));
		$query = $exec->createExecFromArray($tab);

		$exec->execBD($query);
		header('Location: messageAlerte.php?message=10');
	}
	else{
	header('Location: messageAlerte.php?message=0');
}
}
else{
	header('Location: messageAlerte.php?message=3');
}


