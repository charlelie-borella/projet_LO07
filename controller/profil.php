<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/profil.php");
require_once("../view/foot.php");

session_start();
      
$html= headerSite("Votre profil");
$html.= menu();
$html.= contenu();
$html.= foot();

echo $html;