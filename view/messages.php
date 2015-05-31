<?php

//Page qui sert à gérer les messages échangés entre utilisateurs
function nav() {
$html=<<<html
<ul class="nav nav-tabs">
  <li role="presentation"><a href="profil.php">Votre Profil</a></li>
  <li role="presentation"><a href="annonces.php">Vos Annonces</a></li>
  <li role="presentation"><a href="reservations.php">Vos réservations</a></li>
  <li role="presentation" class="active"><a href="#">Messages</a></li>
</ul>

html;
	return $html;
}

function affichageMessage($message, $nom, $prnm){

	$html=<<<html
		<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title">Message de $nom $prnm</h3>
		  </div>
		  <div class="panel-body">
		    $message		
		  </div>
		</div>
html;

	return $html;
}
?>