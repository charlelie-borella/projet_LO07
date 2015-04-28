<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/modifprofil.php");
require_once("../model/exec.php");
require_once("../model/query.php");
require_once("../view/foot.php");
require_once("../model/membre.php");//Il faut inclure la classe pour accéder au membre

session_start();
$file = basename(__FILE__);     

$html= headerSite("Modifier son profil");
$html.= menu($file);
$html.=nav();
$html.=contenu($action);
/*if(isset($_SESSION['membre'])) {
$membre = $_SESSION['membre'];
$html.= contenu();
} else { $html.= "Vous devez vous connecter."; }*/
$html.= foot();