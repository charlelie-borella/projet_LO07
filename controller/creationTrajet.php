<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/connexion.php");
require_once("../view/foot.php");
require_once("../view/creationTrajet.php");


session_start();
$file = basename(__FILE__);

$html= headerSite("création trajet");
$html.= menu($file);
$html.= formulaireCreationTrajet("traitementCreationTrajet.php");
$html.= foot();

echo $html;