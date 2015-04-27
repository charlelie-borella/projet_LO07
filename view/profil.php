<?php

function contenu() {

$html=<<<html

<link rel="stylesheet" href="profil.css" />

<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Votre Profil</a></li>
  <li role="presentation"><a href="#">Vos Annonces</a></li>
  <li role="presentation"><a href="#">Vos réservations</a></li>
  <li role="presentation"><a href="#">Messages</a></li>
  <li role="presentation"><a href="#">Alertes</a></li>
  <li role="presentation"><a href="#">Avis</a></li>
  <li role="presentation"><a href="#">Profil</a></li>
</ul>

<p>
<article>
<aside>
  <h1>Bonjour</h1>
  <p id="photo_profil"><img src="../imageprofil/visueldefaut.jpg" alt="image par défaut" /></p>
  <p>Laisse-moi le temps de me présenter : je m'appelle Zozor, je suis né un 23 novembre 2005.</p>
  <p>Ma description.</p
</aside>
</article>
</p>

<p>
<article>
<aside>
  <div class="pref">
    <h4>Vos préférences : </h4>
        <p>je suis bavarde</p>
        <p>je ne fume pas</p>
        <p><a href="#" class="btn btn-default" role="button">Modifier mes préférences</a></p>
    </div>
</aside>
</article>
</p>

<p>
<article>
<aside>
  <div class="vehicule">
    <h4>Votre véhicule : </h4>
      <p id="photo_profil"><img  src="../ImagesBlablacar/voituredefaut.png" alt="Votre vehicule" /></p>
        <p>Couleur : </p>
        <p>Confort : </p>
        <p><a href="#" class="btn btn-default" role="button">Modifier mon véhicule</a></p>
    </div>
</aside>
</article>
</p>

html;
	return $html;
}