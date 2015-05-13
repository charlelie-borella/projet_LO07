<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/index.php");
require_once("../view/foot.php");
require_once("../view/messageAlerte.php");
require_once("../model/membre.php");
session_start();

$file = basename(__FILE__);     

$html= headerSite("index");
$html.= menu($file);

if(isset($_SESSION['membre'])){
	$html.= recherche("traitementListeTrajet.php");
	$html.= "<script type='text/javascript' src='content/js/rechercheTrajet.js'></script>";
}else{
	$html.= alerte(2, "Vous devez être connecté", "connexion.php", "Se connecter");
}

$html.= foot();

echo $html;
        
      
    