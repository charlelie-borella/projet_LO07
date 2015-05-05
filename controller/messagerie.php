<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/messagerie.php");
require_once("../view/foot.php");
require_once("../model/membre.php");//Il faut inclure la classe pour accéder au membre
require_once("../model/message.php");
require_once("../model/query.php");
include('initBD.php');
session_start();
$file = basename(__FILE__);     

$html= headerSite("Messages");
$html.= menu($file);
$html.= nav();

if(isset($_SESSION['membre']) && isset($_POST["idPassager"])) {


	$html.=messageBox($_POST["idPassager"]);
		
} 
else { 
	$html.= "Vous devez vous connecter."; 
}
$html.= foot();

echo $html;