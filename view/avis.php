<?php
//Page où l'utilisateur va laisser des avis sur le conducteur.

//Models requis : 
require_once("../model/membre.php");

//Pour laisser un avis à quelqu'un :
// <textarea class="form-control" rows="3"></textarea>

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//
//fonction pour le navigateur avec la page avis.php 'active'
function nav() {
$html=<<<html
<ul class="nav nav-tabs">
  <li role="presentation"><a href="profil.php">Votre Profil</a></li>
  <li role="presentation"><a href="annonces.php">Vos Annonces</a></li>
  <li role="presentation"><a href="reservations.php">Vos réservations</a></li>
  <li role="presentation"><a href="messages.php">Messages</a></li>
  <li role="presentation" class="active"><a href="#">Avis</a></li>
  <li role="presentation"><a href="modifprofil.php">Profil</a></li>
</ul>
html;
	return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//Fonction qui renvoie l'entête du tableau hmtl
//Avis reçus
function AvisR($idPassager, $dateTrajet, $villeDep, $villeAr, $prix, $nbPlace) {
  $html=<<<html

<p><table class="table table-striped">
<ul class='list-group'>
<li class='list-group-item list-group-item-info'>Avis reçus</li>
      <tr>
      <th>Nom de la personne</th>
      <th>Satisfaction</th>
      <th>Commentaire laissé</th>
      <th>Evaluation de la conduite</th>
      <th>Date du trajet</th>
      </tr></p>
html;
  return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//Fonction qui renvoie l'entête du tableau hmtl
//Avis laissés
function AvisL($idPassager, $dateTrajet, $villeDep, $villeAr, $prix, $nbPlace) {
  $html=<<<html

<p><table class="table table-striped">
<ul class='list-group'>
<li class='list-group-item list-group-item-warning'>Avis laissés</li>
      <tr>
      <th>Nom de la personne</th>
      <th>Satisfaction</th>
      <th>Commentaire laissé</th>
      <th>Evaluation de la conduite</th>
      <th>Date du trajet</th>
      </tr></p>
html;
  return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//
//Fonction ferme les tableaux
function fin(){
  $html=<<<html
      </table>
    </li>
  </ul>
html;
  return $html;
}
?>