<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/inscription.php");
require_once("../view/foot.php");

      
$html= headerSite("inscription");
$html.= menu();
$html.= formulaire("inscriptionTraitement.php");
$html.= "<script src='content/js/connexionVerificationFormulaire.js'></script>";
$html.= foot();

echo $html;