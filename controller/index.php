<?php

session_start();
require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/index.php");
require_once("../view/foot.php");

      
$html= headerSite("index");
$html.= menu();
$html.= contenu();
$html.= foot();

echo $html;
        
      
    