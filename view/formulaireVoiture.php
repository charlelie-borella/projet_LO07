<?php

function formulaireVoiture($action){

	$html=<<<html
	<div id="body">
		<div id="formulaireCreationTrajet">
			<H3 class="titre">Ajouter un vehicule</H3>

			<form class="form-horizontal" action="$action" method="POST">

			  <div class="form-group">	  
			    <label for="marque" class="col-sm-2 control-label">Marque</label>
			    <div class="col-sm-10">
			      <input type="text" name="marque" class="form-control" id="marque" placeholder="Ex: Peugeot">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="modele" class="col-sm-2 control-label">Modèle</label>
			    <div class="col-sm-10">
			      <input type="text" name="modele" class="form-control" id="modele" placeholder="Ex: Rouge">
			    </div>
			  </div>

			 <div class="form-group">
             <label for="modele" class="col-sm-2 control-label">Année de mise en service</label>
              <div class="col-sm-10">
              	<input name="date" type="date" class="form-control formulaire-with-min champ-form-recherche" id="date" placeholder="2015-03-23">
              </div>
            </div>			  

			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">Envoyer</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
html;

	return $html;

}