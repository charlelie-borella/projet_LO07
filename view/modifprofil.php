<?php
//Page qui permet de modifier son profil.
//Model requis : 
require_once("../model/membre.php");

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//
//fonction pour le navigateur avec la page modifprofil.php 'active'
function nav() {
$html=<<<html
<ul class="nav nav-tabs">
  <li role="presentation"><a href="profil.php">Votre Profil</a></li>
  <li role="presentation"><a href="annonces.php">Vos Annonces</a></li>
  <li role="presentation"><a href="reservations.php">Vos réservations</a></li>
  <li role="presentation"><a href="messages.php">Messages</a></li>
  <li role="presentation"><a href="avis.php">Avis</a></li>
  <li role="presentation" class="active"><a href="modifprofil.php">Profil</a></li>
</ul>
html;
  return $html;
}

//Zone où l'utilisateur doit se décire : 
function contenu (){
	//<textarea class="form-control" rows="3"></textarea>
$html=<<<html
	<form class="form-horizontal" action="modifProfilTraitement.php" method="post">
	  <div class="form-group">
	    <label for="prenom" class="col-sm-2 control-label">Prénom :</label>
	    <div class="col-sm-10">
	      <input type="text" name="prnm" class="form-control" id="prenom" placeholder="prenom">
	    </div>
	  </div>

	<input type="submit" class="btn btn-default"  value="Enregistrer les modifications"></input>

	</form>

html;
  return $html; 
}

?>