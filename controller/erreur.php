<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/foot.php");
require_once("../view/erreur.php");
session_start();

$file = basename(__FILE__);     

$erreur = $_GET["erreur"];

$html= headerSite("Erreur");
$html.= menu($file);
$html.= contenu($erreur);
$html.= foot();

echo $html;