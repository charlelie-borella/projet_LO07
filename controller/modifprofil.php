<?php
//Page qui permet de modifier l'ensemble des informations de mon profil
require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/foot.php");
require_once("../view/modifprofil.php");

require_once("../model/membre.php");

session_start();
$file = basename(__FILE__);     

$html= headerSite("inscription");
$html.= menu();
$html.= nav();
$html.= contenu();

//J'appelle l'ensemble des fonctions de ma page view/modifprofil.php

if(isset($_SESSION['membre'])){
	$html.= prnm();
	$html.= nom();
	$html.= DateNais(); 
	$html.= email();
	$html.= tel();
	$html.= password();
}

$html.= foot();
echo $html;