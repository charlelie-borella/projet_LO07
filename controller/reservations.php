<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/reservations.php");
require_once("../view/foot.php");
//require_once("../model/membre.php");//Il faut inclure la classe pour accéder au membre

session_start();

$html= headerSite("Vos reservations");
$html.= menu();
$html.= contenu();
$html.= foot();

echo $html;