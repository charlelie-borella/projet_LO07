<?php

function titre($date, $villeDep, $villeAr){
	$html=<<<html
		<h3>Fiche du trajet $villeDep/$villeAr le $date</h3>
html;
	return $html;
}



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

function ficheConduc($nom, $prnm, $mail){

	$html=<<<html
		<tr><td>$nom
			<td>$prnm		  	  
			<td>$mail		
html;

	return $html;
}