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
$html.= foot();

echo $html;
        
      
    