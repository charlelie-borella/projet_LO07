<?php

require_once("../model/query.php");
require_once("../model/membre.php");//Il faut inclure la classe pour accéder au membre
include("initBD.php");

session_start();
$file = basename(__FILE__);     

if(isset($_SESSION['membre'])){

	$prnm = $_POST['prnm'];

	$query = new Query($myBase->getMyBase());
	$myQuery = ("UPDATE membre SET prnm ='" .$prnm . "' WHERE idMembre =". $_SESSION['membre']->getIdMembre());
	$res = $query->queryBD($myQuery);
	
}