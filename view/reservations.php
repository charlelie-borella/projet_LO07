<?php

require_once("../model/membre.php");

function nav() {
  $html=<<<html
<ul class="nav nav-tabs">
  <li role="presentation"><a href="profil.php">Votre Profil</a></li>
  <li role="presentation"><a href="annonces.php">Vos Annonces</a></li>
  <li role="presentation" class="active"><a href="#">Vos réservations</a></li>
  <li role="presentation"><a href="messages.php">Messages</a></li>
  <li role="presentation"><a href="modifprofil.php">Profil</a></li>
</ul>
html;
  return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//fonction pour les trajets déjà effectués où date > date trajet
function ResPassees() {
  $html=<<<html
<p><table class="table table-striped">
<ul class='list-group'>
<li class='list-group-item list-group-item-info'>Trajets réservés réalisés</li>
      <tr>
      <th>Conducteur</th>
      <th>Date</th>
      <th>Ville de départ</th>
      <th>Ville d'arrivée</th>
      <th></th>
      </tr></p>
html;
  return $html;
}


// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//fonction pour les trajets déjà effectués où date > date trajet
function ResFutures() {
  $html=<<<html

<p><table class="table table-striped">
<ul class='list-group'>
<li class='list-group-item list-group-item-info'>Trajets réservés à venir</li>
      <tr>
      <th>Conducteur</th>
      <th>Date</th>
      <th>Ville de départ</th>
      <th>Ville d'arrivée</th>
      <th></th>
      </tr>
html;
  return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//Affichage du tableau des reservations futures
function affichage($Prnom, $date, $villeDep, $villeAr, $idVoyage){
  $html=<<<html
    <tr><td>$Prnom
        <td>$date
        <td>$villeDep
        <td>$villeAr
        <td><form action="formulaireAvis.php" method="post">
        <input type="hidden" name="idTrajet" value=$idVoyage></input>
        <input type="submit" class="btn btn-primary" value="Noter le conducteur" />
        </form>
html;
  return $html;
}



// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//Function qui permet de fermer les tableaux ResPassees() et ResFutures()
function fin(){
  $html=<<<html
      </table>
    </li>
  </ul>
html;
  return $html;

}