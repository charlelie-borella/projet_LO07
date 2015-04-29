<?php
require_once("../model/membre.php");
require_once("../model/Trajet.php");

//fonction pour le navigateur
function nav() {
$html=<<<html
<ul class="nav nav-tabs">
  <li role="presentation"><a href="profil.php">Votre Profil</a></li>
  <li role="presentation" class="active"><a href="#">Vos Annonces</a></li>
  <li role="presentation"><a href="reservations.php">Vos réservations</a></li>
  <li role="presentation"><a href="messages.php">Messages</a></li>
  <li role="presentation"><a href="avis.php">Avis</a></li>
  <li role="presentation"><a href="modifprofil.php">Profil</a></li>
</ul>
html;
  return $html;
}


//fonction pour les trajets déjà effectués où date > date trajet
function TPasses($date) {
  $html=<<<html

<p><table class="table table-striped">
<ul class='list-group'>
<li class='list-group-item list-group-item-warning'>Trajets du 
html;

$html.=$date->getDateTrajet();

$html.=<<<html

</li>
      <tr>
      <th>Date du trajet</th>
      <th>Ville de départ</th>
      <th>Ville d'arrivée</th>
      <th>prix</th>
      <th>Nombre de place</th>
      </tr></p>
html;
  return $html;
}



function affichageTPasses($dateTrajet, $villeDep, $villeAr, $prix, $nbPlace){
  $html=<<<html
    <tr><td>$dateTrajet
        <td>$villeDep
        <td>$villeAr
        <td>$prix
        <td>$nbPlace
html;
  return $html;
}

?>