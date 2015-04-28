<?php

require_once("../model/membre.php");
require_once("../model/Trajet.php");

function contenu() {

$html=<<<html

<ul class="nav nav-tabs">
  <li role="presentation"><a href="profil.php">Votre Profil</a></li>
  <li role="presentation" class="active"><a href="#">Vos Annonces</a></li>
  <li role="presentation"><a href="#">Vos réservations</a></li>
  <li role="presentation"><a href="#">Messages</a></li>
  <li role="presentation"><a href="#">Alertes</a></li>
  <li role="presentation"><a href="#">Avis</a></li>
  <li role="presentation"><a href="#">Profil</a></li>
</ul>

html;
//tu dois ajouter à la variable html ;)
//$html.=$membre->getPrnom();

$html.=<<<html
<ul class="list-group">
  <li class="list-group-item">
    <span class="badge">14</span>
    Cras justo odio
  </li>
</ul>


html;
	return $html;
}