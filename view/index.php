<?php

function contenu($action){

$html=<<<html
	<div id="body">
          <h3 class="titre">Rechercher un covoiturage</h3>

          <form class="form-inline formulaireRecherche" action="$action" method="POST">
            <div class="form-group">
              <label class="sr-only" for="de">Ville de départ</label>
              <input type="text" name="villeDep" class="form-control" id="de" placeholder="Ville de départ">
            </div>
            <div class="form-group">
              <label class="sr-only" for="a">Ville d'arrivée</label>
              <input type="text" name="villeAr" class="form-control" id="a" placeholder="Ville d'arrivée">
            </div>
            <div class="form-group">
              <label class="sr-only" for="a">Date</label>
              <input type="date" name="date" class="form-control" id="date" placeholder="date">
            </div>

            <button type="submit" class="btn btn-default">Rechercher</button>
          </form>      
        </div>
html;

  return $html;
}