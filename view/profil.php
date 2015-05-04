<?php

require_once("../model/membre.php");


// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
// Profil de l'utilsateur. 
// Divisé en trois phases : d'abord le descriptif de l'utilisateur, ensuite ses préférences en voiture, ensuite son type de véhicule.

function contenu($membre) {
//Ici équivalent de la fonction nav avec page "Votre Profil" active
$html=<<<html

<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Votre Profil</a></li>
  <li role="presentation"><a href="annonces.php">Vos Annonces</a></li>
  <li role="presentation"><a href="reservations.php">Vos réservations</a></li>
  <li role="presentation"><a href="messages.php">Messages</a></li>
  <li role="presentation"><a href="avis.php">Avis</a></li>
  <li role="presentation"><a href="modifprofil.php">Profil</a></li>
</ul>

<h3>Bonjour $membre</h3>

html;
  return $html;
}

function profil($photo) {
$html=<<<html
<p>
<div class="thumbnail">
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object img-profil" src=$photo alt="image par défaut">
    </a>
  </div>
  <div class="media-body">
    <h3 class="media-heading">Votre profil </h3>
    <p>

    </p>
    
  </div>
</div>
</div>
</p> 
html;
  return $html; 
}


function preferences() {
$html=<<<html
<p>
<div class="thumbnail">
<div class="media">

  <div class="media-body">
    <h3 class="media-heading">Vos préférences</h3>
    
  </div>
</div>
</div>
</p>
html;
  return $html; 
}


function vehicule($modele, $marque, $annee) {
$html=<<<html
<p>
<div class="thumbnail">
<div class="media">
  <div class="media-left media-middle">

  </div>
  <div class="media-body">
    <h3 class="media-heading">Votre véhicule</h3>
    
    Mon modèle : $modele<br />
    Marque : $marque<br />
    Année de mise en service : $annee<br />
  </div>
</div>
</div>

<a href="modifprofil.php" class="btn btn-default" role="button">Modifier votre profil</a>
<p>

html;
	return $html;
}