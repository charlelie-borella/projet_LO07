<?php

require_once("../model/membre.php");

function nav() {

$html=<<<html

<ul class="nav nav-tabs">
  <li role="presentation"><a href="profil.php">Votre Profil</a></li>
  <li role="presentation"><a href="annonces.php">Vos Annonces</a></li>
  <li role="presentation" class="active"><a href="#">Vos réservations</a></li>
  <li role="presentation"><a href="messages.php">Messages</a></li>
  <li role="presentation"><a href="avis.php">Avis</a></li>
  <li role="presentation"><a href="modifprofil.php">Profil</a></li>
</ul>

html;
  return $html;
}
/*$html.=<<<html
<p>
<ul class="list-group">
  <li class="list-group-item list-group-item-info">Historique des trajets réservés</li>

<table class="table table-striped">
  <th><td>Nom du conducteur</td><td>Date</td><td>Ville de Départ</td><td>Ville d'arrivée</td><td>prix</td></th>
  <tr><td>Num</td><td>NomConudcteur</td><td>24/07/2013</td><td>Paris</td><td>Lyon</td><td>prix</td></tr>
  <tr><td>Num</td><td>NomConudcteur</td><td>24/07/2013</td><td>Nancy</td><td>Troyes</td><td>prix</td></tr>
  <tr><td>Num</td><td>NomConudcteur</td><td>24/07/2013</td><td>Lourdes</td><td>Marseille</td><td>prix</td></tr>
</table>
</p>
</ul>
html;
	return $html;
}
?>
*/

function affichageRP($Prnom, $idConducteur, $date, $villeDep, $villeAr){
  $html=<<<html
    <tr><td>$Prnom
        <td>$idConducteur
        <td>$date
        <td>$villeDep
        <td>$villeAr
        <td><a href="annoncesPassagers.php" class="btn btn-primary" role="button">Voir liste passagers</a>
html;
  return $html;
}

//fonction pour les trajets déjà effectués où date > date trajet
function RP() {
  $html=<<<html

<p><table class="table table-striped">
<ul class='list-group'>
<li class='list-group-item list-group-item-info'>Trajets réservés réalisés</li>
      <tr>
      <th>Conducteur</th>
      <th>Conducteur</th>
      <th>Date</th>
      <th>Ville de départ</th>
      <th>Ville d'arrivée</th>
      </tr></p>
html;
  return $html;
}

function affichageRF($Prnom, $idConducteur, $date, $villeDep, $villeAr){
  $html=<<<html
    <tr><td>$Prnom
        <td>$idConducteur
        <td>$date
        <td>$villeDep
        <td>$villeAr
        <td><a href="annoncesPassagers.php" class="btn btn-primary" role="button">Voir liste passagers</a>
html;
  return $html;
}

//fonction pour les trajets déjà effectués où date > date trajet
function RF() {
  $html=<<<html

<p><table class="table table-striped">
<ul class='list-group'>
<li class='list-group-item list-group-item-warning'>Trajets réservés à venir</li>
      <tr>
      <th>Conducteur
      <th>Conducteur</th>
      <th>Date</th>
      <th>Ville de départ</th>
      <th>Ville d'arrivée</th>
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