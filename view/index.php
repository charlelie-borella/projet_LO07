<?php

function contenu($action){

$html=<<<html
	<div id="body">
    <div id="resultat">
    </div>
          <h3 class="titre">Rechercher un covoiturage</h3>

          <form action="traitementListeTrajet.php" method="POST" class="form-inline formulaireRecherche">

            <div class="form-group">
              <label class="sr-only" for="date">Date</label>
              <input name="date" type="date" class="form-control" id="date" placeholder="2015-03-23">
            </div>

            <select name="villeDep" id="villeDep" class="form-control">
              <option value="0">Ville de départ</option>  
            </select>

            <select name="villeAr" id="villeAr" class="form-control">
              <option value="0">Ville d'arrivée</option>  
            </select>            
            
            <button disabled="disabled" type="submit" id="bouton" class="btn btn-default">Rechercher</button>
          </form>      
        </div>
html;

  return $html;
}