<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/foot.php");

require_once("../view/modifprofil.php");

require_once("../model/exec.php");
require_once("../model/query.php");
require_once("../model/voyage.php");
require_once("../model/trajet.php");
require_once("../model/membre.php");//Il faut inclure la classe pour accéder au membre
include("initBD.php");

//session_start();
$file = basename(__FILE__);     

$html= headerSite("Modifier son profil");
$html.= menu($file);
$html.=nav();

$query = new Query($myBase->getMyBase());
$myQuery = ("UPDATE membre SET descriptif WHERE " . $idMembre = $_SESSION['membre'] . "");
$query->queryBD($myQuery);
	echo "<pre>";
	var_dump($query);
	echo "</pre>";

$html.=contenu();
$html.= foot();

echo $html;
