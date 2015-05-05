<?php

require_once("../model/membre.php");


// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
// Profil de l'utilsateur. 
// Divisé en trois phases : d'abord le descriptif de l'utilisateur, ensuite ses préférences en voiture, ensuite son type de véhicule.

function contenu($membre) {
//Ici équivalent de la fonction nav avec page "Votre Profil" active
  $html=<<<html

  <ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="profil.php">Votre Profil</a></li>
    <li role="presentation"><a href="annonces.php">Vos Annonces</a></li>
    <li role="presentation"><a href="reservations.php">Vos réservations</a></li>
    <li role="presentation"><a href="messages.php">Messages</a></li>
    <li role="presentation"><a href="modifprofil.php">Profil</a></li>
  </ul>

  <h3>Bonjour $membre</h3>

html;
  return $html;
}

function solde($solde) {
//Ici équivalent de la fonction nav avec page "Votre Profil" active
  $html=<<<html

   <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Solde</h3>
    </div>
    <div class="panel-body">
      <table class="table profil-solde">
        <tr><td>Votre solde : <td>$solde €
      </table>
    </div>
  </div>

html;
  return $html;
}

function profil($photo, $prnm, $nom, $dateNais, $mail, $tel, $mdp) {
  $html=<<<html
      <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Votre véhicule</h3>
          </div>
          <div class="panel-body">
            <div class="media">
              <div class="media-left media-top">
                  <img class="media-object img-profil" src=$photo alt="image par défaut">
              </div>            
            <div class="media-body">
              <table class="table profil">
                <tr><td>Votre nom : <td>$nom
                <tr><td>Votre prénom : <td>$prnm
                <tr><td> Votre date de naissance : <td>$dateNais
                <tr><td>Votre e-mail: <td>$mail
                <tr><td>Votre numéro de téléphone : <td>$tel
              </table>
            </div>
          </div>
        </div>
    </div>
html;
  return $html;
}

function vehicule($modele, $couleur, $marque, $annee ) {
  $html=<<<html
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Votre véhicule</h3>
      </div>
      <div class="panel-body">
        <table class="table profil">
          <tr><td>Mon modèle : <td>$modele
          <tr><td>Marque : <td>$marque
          <tr><td>Couleur : <td>$couleur
          <tr><td>Année de mise en service : <td>$annee
        </table>
      </div>
    </div>

html;
	return $html;
}