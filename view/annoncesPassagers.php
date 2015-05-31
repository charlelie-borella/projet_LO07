<?php
//Cette page permet de voir l'ensemble des passagers qui ont participé au trajet sélectionné sur la page annonces.php
//Ici l'utilisateur est le conducteur.

//Models requis : 
require_once("../model/membre.php");
require_once("../model/Trajet.php");

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//
//fonction pour le navigateur avec la page annonces.php 'active'
function nav() {
$html=<<<html
<ul class="nav nav-tabs">
  <li role="presentation"><a href="profil.php">Votre Profil</a></li>
  <li role="presentation" class="active"><a href="#">Vos Annonces</a></li>
  <li role="presentation"><a href="reservations.php">Vos réservations</a></li>
  <li role="presentation"><a href="messages.php">Messages</a></li>
</ul>
html;
  return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//
//Fonction pour les trajets déjà effectués (date > date trajet).
//Fonction qui affiche l'entête du tableau seulement.
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

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//
//Fonction qui permet l'affichage des trajets passés (date > date trajet)
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