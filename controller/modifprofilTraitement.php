<?php

require_once("../model/query.php");
require_once("../model/membre.php");//Il faut inclure la classe pour accéder au membre
include("initBD.php");

session_start();
$file = basename(__FILE__);     

if(isset($_SESSION['membre'])){
// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
	$prnm = $_POST['prnm'];

	$query = new Query($myBase->getMyBase());
	$myQuery = ("UPDATE membre SET prnm ='" .$prnm . "' WHERE idMembre =". $_SESSION['membre']->getIdMembre());
	$res = $query->queryBD($myQuery);
// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
	$nom = $_POST['nom'];

	$query = new Query($myBase->getMyBase());
	$myQuery = ("UPDATE membre SET nom ='" .$nom . "' WHERE idMembre =". $_SESSION['membre']->getIdMembre());
	$res = $query->queryBD($myQuery);
// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
	$dateNais = $_POST['dateNais'];

	$query = new Query($myBase->getMyBase());
	$myQuery = ("UPDATE membre SET dateNais ='" .$dateNais . "' WHERE idMembre =". $_SESSION['membre']->getIdMembre());
	$res = $query->queryBD($myQuery);
// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
	$email = $_POST['mail'];

	$query = new Query($myBase->getMyBase());
	$myQuery = ("UPDATE membre SET mail ='" .$email . "' WHERE idMembre =". $_SESSION['membre']->getIdMembre());
	$res = $query->queryBD($myQuery);
// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
	$tel = $_POST['tel'];

	$query = new Query($myBase->getMyBase());
	$myQuery = ("UPDATE membre SET mail ='" .$email . "' WHERE idMembre =". $_SESSION['membre']->getIdMembre());
	$res = $query->queryBD($myQuery);
// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
	$password = $_POST['password'];

	$query = new Query($myBase->getMyBase());
	$myQuery = ("UPDATE membre SET password ='" .$password . "' WHERE idMembre =". $_SESSION['membre']->getIdMembre());
	$res = $query->queryBD($myQuery);
}