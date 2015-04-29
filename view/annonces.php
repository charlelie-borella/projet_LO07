<?php
require_once("../model/membre.php");

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


//fonction pour les trajets pas encore effectués où date < date trajet
function Tfuturs() {

$html=<<<html

<p><table class="table table-striped">
<ul class='list-group'>
<li class='list-group-item list-group-item-info'>Trajets à venir</li>
      <tr>
      <th>Liste passagers inscrits</th>
      <th>Date du trajet</th>
      <th>Ville de départ</th>
      <th>Ville d'arrivée</th>
      <th>prix</th>
      <th>Nombre de place</th>
      </tr></p>
html;
  return $html;
}


function affichageTFuturs($idPassager, $dateTrajet, $villeDep, $villeAr, $prix, $nbPlace){
  $html=<<<html
    <tr><td>$idPassager
        <td>$dateTrajet
        <td>$villeDep
        <td>$villeAr
        <td>$prix
        <td>$nbPlace
html;
  return $html;
}
//fonction pour les trajets déjà effectués où date > date trajet
function Tpasses() {
  $html=<<<html

<p><table class="table table-striped">
<ul class='list-group'>
<li class='list-group-item list-group-item-warning'>Trajets passés</li>
      <tr>
      <th>Liste passagers inscrits</th>
      <th>Date du trajet</th>
      <th>Ville de départ</th>
      <th>Ville d\'arrivée</th>
      <th>prix</th>
      <th>Nombre de place</th>
      </tr></p>
html;
  return $html;
}

function fin(){
  $html=<<<html
      </table>
    </li>
  </ul>
html;
  return $html;
}
