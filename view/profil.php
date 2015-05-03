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
<h3>Bonjour

html;

//Variable hmtl qui récupère le prénom de l'utilisateur.
$html.=$membre->getPrnom();

$html.=<<<html
</h3>
<p>
<div class="thumbnail">
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src="../imageprofil/visueldefaut.jpg" alt="image par défaut">
    </a>
  </div>
  <div class="media-body">
    <h3 class="media-heading">Votre profil </h3>
    <p></p>
    
  </div>
</div>
</div>
</p>


<p>
<div class="thumbnail">
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src="" alt="">
    </a>
  </div>
  <div class="media-body">
    <h3 class="media-heading">Vos préférences</h3>
    J'aime bien les animaux. J'aime écouter de la musique.
  </div>
</div>
</div>
<p>

<p>
<div class="thumbnail">
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src="../ImagesBlablacar/voituredefaut.png" alt="Voiture">
    </a>
  </div>
  <div class="media-body">
    <h3 class="media-heading">Votre véhicule</h3>
  </div>
</div>
</div>

<a href="modifprofil.php" class="btn btn-default" role="button">Modifier votre profil</a>
<p>

html;
	return $html;
}