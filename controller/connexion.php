<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/foot.php");

      
$html= headerSite("index");
$html.= menu();
$html.= formulaireConnexion("connexionTraitement.php");
$html.= foot();

echo $html;