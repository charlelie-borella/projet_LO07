<?php

function deb(){
	$html=<<<html
	<div id="body">
		<div id="listeTrajet">
			<h3 class="titre">Liste des membres</h3>
			<div id="trajet">	
				<table class="table">
				<tr>
				    <th>Photo</th>
				    <th>Nom</th> 
				    <th>Prénom</th>
				    <th>Date de naissance</th>
				    <th>Mail</th>
				    <th>téléphone</th>
				</tr>
html;
	return $html;
}

function fin(){
	$html=<<<html
				</table>
			</div>
		</div>
	</div>
html;
	return $html;
}


function affichageListeCompte($photo, $nom, $prnm, $date, $mail, $tel){

	$html="";

	if($photo==""){
		$html.="<tr><td><img class='img-profil' src='content/photoProfil/visueldefaut.jpg' alt='photoProfil'></a>";
	}else{
		$html.="<tr><td><img class='img-profil' src='$photo' alt='photoProfil'></a>";
	}


	$html.=<<<html
		
			<td>$nom
			<td>$prnm 
			<td>$date			  	  
			<td>$mail
			<td>$tel
html;

	return $html;
}