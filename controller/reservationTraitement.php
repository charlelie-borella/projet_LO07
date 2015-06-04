<?php 

require_once("../model/exec.php");
require_once("../model/membre.php");
include("initBD.php");

session_start();

if(isset($_SESSION['membre']) && isset($_POST['idTrajet']) && isset($_POST["nbPlaces"]))
{

	$idTrajet = htmlspecialchars($_POST["idTrajet"]);
	$nbPlaces = $_POST["nbPlaces"];
	
	$idMembre = $_SESSION["membre"]->getIdMembre();

	$exec = new Exec($myBase->getMyBase());

	$tab = array('voyage'=>array('idPassager'=>$idMembre, 'idTrajet'=>$idTrajet));
	$query = $exec->createExecFromArray($tab);
	
	for ($i=0; $i < $nbPlaces; $i++) { 
		$exec->execBD($query);
	}
	
	
	header('Location: messageAlerte.php?message=5');

}else{

	header('Location: messageAlerte.php?message=1');
}