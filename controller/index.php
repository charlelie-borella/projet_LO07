<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/index.php");
require_once("../view/foot.php");
require_once("../model/membre.php");
session_start();

$file = basename(__FILE__);     

$html= headerSite("index");
$html.= menu($file);
$html.= contenu("traitementListeTrajet.php");
$html.= "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>";
$html.= "<script type='text/javascript' src='design/js/rechercheTrajet.js'></script>";
$html.= foot();

echo $html;
        
      
    