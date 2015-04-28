<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/messages.php");
require_once("../view/foot.php");
require_once("../model/membre.php");//Il faut inclure la classe pour accéder au membre

session_start();
$file = basename(__FILE__);     

$html= headerSite("Messages");
$html.= menu($file);

if(isset($_SESSION['membre'])) {
$membre = $_SESSION['membre'];
$html.= contenu();
} else { $html.= "Vous devez vous connecter."; }
$html.= foot();

echo $html;