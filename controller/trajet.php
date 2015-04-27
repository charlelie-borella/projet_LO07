<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/connexion.php");
require_once("../view/foot.php");
require_once("../model/exec.php");
require_once("../model/query.php");

      
$html= headerSite("index");
$html.= menu();
$html.= foot();

echo $html;