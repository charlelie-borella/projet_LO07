<?php
//Page qui affiche la liste des annonces (idMembre = conducteurID)

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
  <li role="presentation"><a href="modifprofil.php">Profil</a></li>
</ul>
html;
  return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//
//Fonction pour les trajets pas encore effectués (date < date trajet)
//Retourne l'entête du tableau hmtl seulement.
function affichageTH() {

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
      <th></th>
      <th></th>
      <th></th>
html;
  return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
// Fonction qui permet d'afficher les trajets déjà effectués. 
// Chaque variable est insérée dans la tableau et 
// Il y a un bouton "voir liste passager" pour voir leurs profils et mettre des avis.
function affichageTrajetPasse($dateTrajet, $villeDep, $villeAr, $prix, $nbPlace, $idTrajet, $etat){
  $html=<<<html
    <tr><td>$dateTrajet
        <td>$villeDep
        <td>$villeAr
        <td>$prix
        <td>$nbPlace
        <form action="ficheDescriptifTrajet.php" method="POST">
              <td><input type="submit" id="bouton" value="Descriptif" class="btn btn-primary"></input>      
              <input type="hidden" name="idTrajet" value=$idTrajet></input>
              </form>
html;

if($etat == 0){
    $html.=<<<html
        <form action="validationTrajetTraitement.php" method="POST">
          <td><input type="submit" id="boutonValiderTrajet" value="Valider" class="btn btn-primary"></input>      
              <input type="hidden" name="idTrajet" value=$idTrajet></input>
              <input type="hidden" name="prix" value=$prix></input>
        <input type="hidden" name="idTrajet" value=$idTrajet></input>
html;
  }    

$html.=<<<html
        <form action="suppresionTrajetTraitement.php" method="POST">
        <td><input type="submit" id="boutonSup" value="Supprimer" class="btn btn-primary"></input>      
            <input type="hidden" name="idTrajet" value=$idTrajet></input>
            <input type="hidden" name="dateTrajet" value=$dateTrajet></input>
            <input type="hidden" name="villeDep" value=$villeDep></input>
            <input type="hidden" name="villeAr" value=$villeAr></input>
        </form>
html;
  return $html;
}

  

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
// Fonction qui permet d'afficher les trajets passés. 
// Chaque variable est insérée dans la tableau et 
// Il y a un bouton "voir liste passager" pour voir leurs profils et mettre des avis.
function affichageAVenir($dateTrajet, $villeDep, $villeAr, $prix, $nbPlace, $idTrajet){
  $html=<<<html
    <tr><td>$dateTrajet
        <td>$villeDep
        <td>$villeAr
        <td>$prix
        <td>$nbPlace
        <form action="ficheDescriptifTrajet.php" method="POST">
              <td><input type="submit" id="bouton" value="Descriptif" class="btn btn-primary"></input>      
              <input type="hidden" name="idTrajet" value=$idTrajet></input>
              </form>
        <form action="suppresionTrajetTraitement.php" method="POST">
        <td><input type="submit" id="boutonSup" value="Supprimer" class="btn btn-primary"></input>      
        <input type="hidden" name="idTrajet" value=$idTrajet></input>
        <input type="hidden" name="dateTrajet" value=$dateTrajet></input>
        <input type="hidden" name="villeDep" value=$villeDep></input>
        <input type="hidden" name="villeAr" value=$villeAr></input>
        </form>  
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
