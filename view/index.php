<?php

function contenu(){

$html=<<<html
	<div id="body">
          <h3 class="titre">Rechercher un covoiturage</h3>

          <form class="form-inline formulaireRecherche">
            <div class="form-group">
              <label class="sr-only" for="de">Ville de départ</label>
              <input type="text" class="form-control" id="de" placeholder="Ville de départ">
            </div>
            <div class="form-group">
              <label class="sr-only" for="a">Ville d'arrivée</label>
              <input type="text" class="form-control" id="a" placeholder="Ville d'arrivée">
            </div>
            <div class="form-group">
              <label class="sr-only" for="a">Date</label>
              <input type="date" class="form-control" id="date" placeholder="date">
            </div>

            <button type="submit" class="btn btn-default">Rechercher</button>
          </form>      
        </div>
html;

  return $html;
}