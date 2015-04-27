<?php

require_once ("../model/exec.php");
require_once ("../model/query.php");
include("initBD.php");

$nom;
$prnm;
$mail;
$password;


// $first_name= "test";
// $password = "test";

if(isset($_POST["nom"]) && !empty($_POST["nom"])){
	$nom = $_POST["nom"];
}
if(isset($_POST["prnm"]) && !empty($_POST["prnm"])){
	$prnm = $_POST["prnm"];
}
if(isset($_POST["mail"]) && !empty($_POST["mail"])){
	$mail = $_POST["mail"];
}
if(isset($_POST["password"]) && !empty($_POST["password"])){
	$password = $_POST["password"];
}


$exec = new Exec($myBase->getMyBase());

$tab = array('membre'=>array('nom'=>$nom, 'prnm'=>$prnm, 'mail'=>$mail, 'password'=>$password));
$query = $exec->createExecFromArray($tab);

$exec->execBD($query);


header('Location: index.php'); 
