<?php

//Models requis : 
require_once("../model/membre.php");

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
  <li role="presentation"><a href="avis.php">Avis</a></li>
  <li role="presentation"><a href="modifprofil.php">Profil</a></li>
</ul>
html;
  return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//
//Fonction pour les trajets pas encore effectués (date < date trajet)
//Retourne l'entête du tableau hmtl seulement.
function Tfuturs() {

$html=<<<html

<p><table class="table table-striped">
<ul class='list-group'>
<li class='list-group-item list-group-item-info'>Trajets à venir</li>
      <tr>
      <th>Date du trajet</th>
      <th>Ville de départ</th>
      <th>Ville d'arrivée</th>
      <th>prix</th>
      <th>Nombre de place</th>
      <th>Passagers</th>
      </tr></p>
html;
  return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
// Fonction qui permet d'afficher les trajets pas encore effectués. 
// Chaque variable est insérée dans la tableau et 
// Il y a un bouton "voir liste passager" pour voir leurs profils.
// Pas possible de donner des avis puisque le trajet n'est pas encore effectué
function affichageTFuturs($dateTrajet, $villeDep, $villeAr, $prix, $nbPlace){
  $html=<<<html
    <tr>
        <td>$dateTrajet
        <td>$villeDep
        <td>$villeAr
        <td>$prix
        <td>$nbPlace
        <td><a href="annoncesPassagers.php" class="btn btn-primary" role="button">Voir liste passagers</a>
html;
  return $html;
}

//_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//Fonction pour les trajets déjà effectués (date > date trajet)
//Retourne l'entête du tableau html seulement.
function TPasses() {
  $html=<<<html

<p><table class="table table-striped">
<ul class='list-group'>
<li class='list-group-item list-group-item-warning'>Trajets passés</li>
      <tr>
      <th>Date du trajet</th>
      <th>Ville de départ</th>
      <th>Ville d'arrivée</th>
      <th>prix</th>
      <th>Nombre de place</th>
      <th>Passagers</th>
      </tr></p>
html;
  return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
// Fonction qui permet d'afficher les trajets déjà effectués. 
// Chaque variable est insérée dans la tableau et 
// Il y a un bouton "voir liste passager" pour voir leurs profils et mettre des avis.
function affichageTPasses($dateTrajet, $villeDep, $villeAr, $prix, $nbPlace){
  $html=<<<html
    <tr><td>$dateTrajet
        <td>$villeDep
        <td>$villeAr
        <td>$prix
        <td>$nbPlace
        <td><a href="annoncesPassagers.php" class="btn btn-primary" role="button">Voir liste passagers</a>
html;
  return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//Fonction qui permet de fermer les différents tableaux.s
function fin(){
  $html=<<<html
      </table>
    </li>
  </ul>
html;
  return $html;
}
