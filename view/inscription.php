<?php
//Inscription au site => insertion dans la base de données. 
// Eléments à rentrer dans le formulaire : 
// Nom, prénom, date de naissance, photo, e-mail, mot de passe avec vérification du mot de passe.
// La photo n'est pas obligatoire.
function formulaire($action){
	
$html=<<<html
	<div id="body">
		<h3 class="titre">Inscription</h3>
		<div id="formulaire">
			<form id="formulaireInscription" class="form-horizontal" action="$action" method="POST" enctype="multipart/form-data"> 
			
			<div id="formNom" class="form-group">
			    <label for="nom" class="col-sm-2 control-label">Nom</label>
			    <div class="col-sm-10">
			      <input type="text" name="nom" class="form-control" id="nom" value="" placeholder="Nom">			     
			    </div>
			  </div>		

			  <div id="formPrnm" class="form-group">
			    <label for="prnm" class="col-sm-2 control-label">Prénom</label>
			    <div class="col-sm-10">
			      <input type="text" name="prnm" class="form-control" id="prnm" placeholder="Prénom">
			    </div>
			  </div>

			  <div id="formDate" class="form-group">  
			  <label class="col-sm-2 control-label">Date de naissance</label>
			  <table>
			  <tr><td><label for="jour" class="col-sm-2 control-label">Jour</label>
			  <td><select name="jour" id="jour" class="form-control">
			  <option value="-">-</option>
html;
			for ($i=1; $i <= 31 ; $i++) { 
				$html.= "<option value='$i'>$i</option>";
			}
	$html.=<<<html
			</select>
			<td><label for="mois" class="col-sm-2 control-label">Mois</label>
			<td><select name="mois" id="mois" class="form-control">
			<option value="-">-</option>
html;
			for ($i=1; $i <= 12; $i++) { 
				$html.= "<option value='$i'>$i</option>";
			}

			$html.=<<<html
			</select>
			<td><label for="annee" class="col-sm-2 control-label">Année</label>
			<td><select name="annee" id="annee" class="form-control">
			<option value="-">-</option>
html;
			for ($i=2015; $i >= 1950; $i--) { 
				$html.= "<option value='$i'>$i</option>";
			}

	$html.=<<<html
			</select>
			</table>
		  </div>

		  <div id="formPhoto" class="form-group">
		    <label for="photo" class="col-sm-2 control-label">Photo</label>
		    <div class="col-sm-10">
		       <input type="file" name="photo" id="photo">
		    </div>
		  </div>

		  <div id="formMail" class="form-group">
		    <label for="mail" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" name="mail" class="form-control" id="mail" placeholder="Email">
		    </div>
		  </div>

		  <div id="formTel" class="form-group">
		    <label for="tel" class="col-sm-2 control-label">Téléphone</label>
		    <div class="col-sm-10">
		      <input type="tel" name="tel" class="form-control" id="tel" placeholder="Ex : 06..">
		    </div>
		  </div>

		  <div id="formPass1" class="form-group">
		    <label for="inputPassword1" class="col-sm-2 control-label">Mot de passe</label>
		    <div class="col-sm-10">
		      <input type="password" name="password" class="form-control" id="pass1" placeholder="Mot de passe">
		    </div>
		  </div>

		   <div id="formPass2" class="form-group">
		    <label for="inputPassword2" class="col-sm-2 control-label">Confirmation</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="pass2" placeholder="Confirmation mot de passe">
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" verifForm() class="btn btn-default">S'inscrire</button>
		    </div>
		  </div>
		</form>
	</div>
</div>
html;

return $html;

}