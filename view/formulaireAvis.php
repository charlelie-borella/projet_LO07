<?php

function formulaireAvis($action, $idVoyage){
	$html=<<<html
	<div id="body">
		<div id="formulaireCreationTrajet">
			<H3 class="titre">Rédiger un commentaire</H3>

			<form class="form-horizontal" action="$action" method="POST">

			  <div class="form-group">	  
			    <label for="note" class="col-sm-2 control-label">Note</label>
			    <div class="col-sm-10">
			      <select name="note" class="form-control">
			      	<option value=5>Extraordinaire</option>
			      	<option value=4>Excellent</option>
			      	<option value=3>Bien</option>
			      	<option value=2>Décevant</option>
			      	<option value=1>A éviter</option>
			      </select>
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="commentaire" class="col-sm-2 control-label">Commentaire</label>
			    <div class="col-sm-10">			   
			      <textarea class="form-control" name="commentaire" id="commentaire" rows="3" placeholder="Ex: Trajet très agréable et convivial"></textarea>
			    </div>
			  </div>			

			  <input type="hidden" name="idTrajet" value=$idVoyage>
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