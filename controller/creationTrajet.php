<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/connexion.php");
require_once("../view/foot.php");
require_once("../view/creationTrajet.php");
require_once("../view/messageAlerte.php");
require_once("../model/membre.php");



session_start();
$file = basename(__FILE__);

$html= headerSite("création trajet");
$html.= menu($file);

if($_SESSION['membre']->getVehiculeID() == null){
	$html.=contenu(8);
}
else{
	$html.= formulaireCreationTrajet("traitementCreationTrajet.php");	
}
$html.= foot();

echo $html;