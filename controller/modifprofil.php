<?php
require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/foot.php");
require_once("../view/modifprofil.php");
require_once("../model/membre.php");//Il faut inclure la classe pour accéder au membre

session_start();
$file = basename(__FILE__);     

$html= headerSite("inscription");
$html.= menu();
$html.= nav();

if(isset($_SESSION['membre'])){
	$html.= contenu();
}

$html.= foot();
echo $html;