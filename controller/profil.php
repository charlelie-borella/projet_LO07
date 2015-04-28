<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/profil.php");
require_once("../view/foot.php");
require_once("../model/membre.php");//Il faut inclure la classe pour accéder au membre

session_start();

$html= headerSite("Votre profil");
$html.= menu();
if(isset($_SESSION['membre'])) {
$membre = $_SESSION['membre'];
$html.= contenu($membre);
} else { $html.= "Vous devez vous connecter."; }
$html.= foot();

echo $html;