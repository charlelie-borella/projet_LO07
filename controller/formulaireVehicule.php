<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/formulaireVoiture.php");
require_once("../view/foot.php");

session_start();
$file = basename(__FILE__);
      
$html= headerSite("connexion");
$html.= menu();
$html.= formulaireVoiture("formulaireVehiculeTraitement.php");
$html.= foot();

echo $html;