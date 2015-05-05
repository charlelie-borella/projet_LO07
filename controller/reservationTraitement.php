<?php 

require_once("../model/exec.php");
require_once("../model/membre.php");
include("initBD.php");

session_start();

if(isset($_SESSION['membre']) && isset($_POST['idTrajet']))
{

	$idTrajet = htmlspecialchars($_POST["idTrajet"]);
	
	$idMembre = $_SESSION["membre"]->getIdMembre();

	$exec = new Exec($myBase->getMyBase());

	$tab = array('voyage'=>array('idPassager'=>$idMembre, 'idTrajet'=>$idTrajet));
	$query = $exec->createExecFromArray($tab);
	$exec->execBD($query);
	header('Location: messageAlerte.php?message=5');

}else{

	header('Location: messageAlerte.php?message=1');
}