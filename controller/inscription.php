<?php

require_once "../view/header.php";
require_once "../view/menu.php";
require_once "../view/inscription.php";
require_once "../view/foot.php";

      
$html= headerSite("index");
$html.= menu();
$html.= formulaire("inscriptionTraitement.php");
$html.= foot();

echo $html;