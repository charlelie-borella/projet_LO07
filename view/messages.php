<?php
//Models requis : 
require_once("../model/membre.php");

//Page qui sert à gérer les messages échangés entre utilisateurs
function contenu() {
$html=<<<html
<ul class="nav nav-tabs">
  <li role="presentation"><a href="profil.php">Votre Profil</a></li>
  <li role="presentation"><a href="annonces.php">Vos Annonces</a></li>
  <li role="presentation"><a href="reservations.php">Vos réservations</a></li>
  <li role="presentation" class="active"><a href="#">Messages</a></li>
  <li role="presentation"><a href="modifprofil.php">Profil</a></li>
</ul>

html;
	return $html;
}
?>