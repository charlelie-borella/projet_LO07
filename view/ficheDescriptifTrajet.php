<?php
//Page récupère les informations de annonces.php

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ 
//
//Fonction qui donne le titre du trajet
function titre($date, $villeDep, $villeAr){
	$html=<<<html
		<h3>Fiche du trajet $villeDep/$villeAr le $date</h3>
html;
	return $html;
}


// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//
//Fonction
function debConduc($type){
	$html=<<<html

		<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title">$type</h3>
		  	</div>	

				<div id="conducteur">	
				<table class="table">
				<tr>
				    <th>Nom
				    <th>Prénom</th>
				    <th>Mail				    
				</tr>
html;
	return $html;
}

function fin(){
	$html=<<<html
				</table>							    					
		</div>
	</div>
html;
	return $html;
}

function ficheConduc($nom, $prnm, $mail, $idPassager, $idTrajet){

	$html=<<<html
		<tr><td>$nom
			<td>$prnm		  	  
			<td>$mail
			<td><form action="formulaireAvis.php" method="POST">
				<button type="submit" id="bouton" class="btn btn-primary">Commentaire</button>
				<input type="hidden" name="idPassager" value=$idPassager></input>
				<input type="hidden" name="idTrajet" value=$idTrajet></input>		
				</form>	
html;

	return $html;
}