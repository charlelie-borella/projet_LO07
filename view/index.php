<?php

function contenu($action){

$html=<<<html
	<div id="body">
    <div id="resultat">
    </div>
          <h3 class="titre">Rechercher un covoiturage</h3>

          <form class="form-inline formulaireRecherche">

            <div class="form-group">
              <label class="sr-only" for="date">Date</label>
              <input type="date" name="date" class="form-control" id="date" placeholder="date">
            </div>

            <select disabled="disabled" name="villeDep" id="de" class="form-control">
              <option>Ville de départ</option>  
            </select>

            <select disabled="disabled" name="villeAr" id="a" class="form-control">
              <option>Ville d'arrivée</option>  
            </select>            
            
            <button type="submit" id="bouton" class="btn btn-default">Rechercher</button>
          </form>      
        </div>
html;

  return $html;
}