<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/foot.php");
require_once("../view/listeTrajet.php");
require_once("../model/exec.php");
require_once("../model/query.php");

session_start();
      
$html= headerSite("liste trajet");
$html.= menu();
$html.= deb();
$html.= trajet();
$html.= fin();
$html.= foot();

echo $html;