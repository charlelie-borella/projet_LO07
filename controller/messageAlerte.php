<?php

require_once("../model/membre.php");
require_once("../view/messageAlerte.php");
require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/foot.php");

session_start();

$file = basename(__FILE__);     

$message = $_GET["message"];

$html= headerSite("Message");
$html.= menu($file);
$html.= contenu($message);
$html.= foot();

echo $html;