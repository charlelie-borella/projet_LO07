<?php

function formulaireCreationTrajet($action){

	$html=<<<html
	
	<div id="formulaireCreationTrajet">
		<H3 class="titre">Ajouter un trajet</H3>

		<form class="form-horizontal" action="$action" method="POST">

		  <div class="form-group">	  
		    <label for="villeDep" class="col-sm-2 control-label">Ville de départ</label>
		    <div class="col-sm-10">
		      <input type="text" name="villeDep" class="form-control" id="villeDep" placeholder="Ex: Paris">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="villeAr" class="col-sm-2 control-label">Ville d'arrivée</label>
		    <div class="col-sm-10">
		      <input type="text" name="villeAr" class="form-control" id="villeAr" placeholder="Ex: Lyon">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="nbPlace" class="col-sm-2 control-label">Date de départ</label>
		    <div class="col-sm-10">		    
				<label class="sr-only" for="nbPlace">Date de départ</label>
				<div class="input-group">
					<div class="input-group-addon">Heure</div>
				      	<input type="time" name="heure" class="form-control" id="dateDep">												
					<div class="input-group-addon">Jour</div>
				      	<input type="date" name="jour" class="form-control" id="dateDep">
				</div>					    
		    </div>
		  </div> 		

		  <div class="form-group">
		    <label for="nbPlace" class="col-sm-2 control-label">Nombre de places</label>
		    <div class="col-sm-10">
		      <select class="form-control" name="nbPlace">
		      	<option value="-">-</option>
		      	<option value="1">1</option>
		      	<option value="2">2</option>
		      	<option value="3">3</option>
		      	<option value="4">4</option>
		      	<option value="5">5</option>
		      </select>	      
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="prix" class="col-sm-2 control-label">Prix</label>
		    <div class="col-sm-10">		    
				<label class="sr-only" for="prix">Amount (in euro)</label>
				<div class="input-group">
				      	<input type="text" class="form-control" id="prix" placeholder="Ex: 10">
				    <div class="input-group-addon">€</div>
				</div>
		    </div>
		  </div> 

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Envoyer</button>
		    </div>
		  </div>
		</form>
	</div>
html;

	return $html;

}