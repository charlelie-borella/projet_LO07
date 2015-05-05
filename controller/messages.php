<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/messages.php");
require_once("../view/foot.php");
require_once("../model/membre.php");//Il faut inclure la classe pour accéder au membre
require_once("../model/message.php");
require_once("../model/query.php");
include('initBD.php');
session_start();
$file = basename(__FILE__);     

$html= headerSite("Messages");
$html.= menu($file);
$html.= nav();

if(isset($_SESSION['membre'])) {

	$query = new Query($myBase->getMyBase());
	$myQuery = "SELECT message, nom, prnm FROM message m, membre me WHERE m.ProprietaireID = me.idMembre AND destinataireID = ". $_SESSION['membre']->getIdMembre();
	$query->queryBD($myQuery);
	$res = $query->recoverQueryInArray();


	foreach ($res as $key => $value) {
		
		$message = $value['message'];
		$nom = $value['nom'];
		$prnm = $value['prnm'];

		$html.=affichageMessage($message,$nom,$prnm);

	}

		
} 
else { 
	$html.= "Vous devez vous connecter."; 
}
$html.= foot();

echo $html;