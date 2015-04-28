<?php

function contenu() {

$prnm = $_SESSION['membre']->getPrnm();

$html=<<<html

<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Votre Profil</a></li>
  <li role="presentation"><a href="#">Vos Annonces</a></li>
  <li role="presentation"><a href="#">Vos réservations</a></li>
  <li role="presentation"><a href="#">Messages</a></li>
  <li role="presentation"><a href="#">Alertes</a></li>
  <li role="presentation"><a href="#">Avis</a></li>
  <li role="presentation"><a href="#">Profil</a></li>
</ul>
<h3>Bonjour

  $_SESSION['membre']->getPrnm(); 
html; 

$html=<<<html
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
    <p>Je suis XXXX, je suis étudiant en droit à l'université Assas à Paris. J'utilise généralement ce site pour le trajet Paris-Nancy (ex)</p>
    
  </div>
</div>
</div>
<a href="#" class="btn btn-default" role="button">Modifier votre description</a>
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

<a href="#" class="btn btn-default" role="button">Modifier vos préférences</a>
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

<a href="#" class="btn btn-default" role="button">Modifier</a>
<p>


html;
	return $html;
}