<?php

require_once("../view/administration/header.php");
require_once("../view/administration/connexion.php");
require_once("../view/administration/foot.php");

      
$html= headerSite("connexion administration");

$html.= formulaireConnexion("connexionAdministrationTraitement.php");
$html.= foot();

echo $html;