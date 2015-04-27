<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/connexion.php");
require_once("../view/foot.php");
require_once("../view/creationTrajet.php");


session_start();
      
$html= headerSite("création trajet");
$html.= menu();
$html.= formulaireCreationTrajet("traitementCreationTrajet.php");
$html.= foot();

echo $html;