<?php
//Page qui permet de modifier son profil.
//Model requis : 
require_once("../model/membre.php");

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//
//fonction pour le navigateur avec la page modifprofil.php 'active'
function nav() {
$html=<<<html
<ul class="nav nav-tabs">
  <li role="presentation"><a href="profil.php">Votre Profil</a></li>
  <li role="presentation"><a href="annonces.php">Vos Annonces</a></li>
  <li role="presentation"><a href="reservations.php">Vos réservations</a></li>
  <li role="presentation"><a href="messages.php">Messages</a></li>
  <li role="presentation"><a href="avis.php">Avis</a></li>
  <li role="presentation" class="active"><a href="modifprofil.php">Profil</a></li>
</ul>
html;
  return $html;
}

//Zone où l'utilisateur doit se décire : 
function contenu (){
$html=<<<html

<textarea class="form-control" rows="3"></textarea>


html;
  return $html; 
}

?>