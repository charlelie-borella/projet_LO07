<?php

function formulaire($action){
	
$html=<<<html
	<div id="body">
		<h3 class="titre">Inscription</h3>
		<div id="formulaire">
			<form class="form-horizontal" action="$action" method="POST" enctype="multipart/form-data"> 
			<div class="form-group">
			    <label for="nom" class="col-sm-2 control-label">Nom</label>
			    <div class="col-sm-10">
			      <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="prnm" class="col-sm-2 control-label">Prénom</label>
			    <div class="col-sm-10">
			      <input type="text" name="prnm" class="form-control" id="prnm" placeholder="Prénom">
			    </div>
			  </div>

			  <div class="form-group">  
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

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Photo</label>
		    <div class="col-sm-10">
		       <input type="file" name="photo" id="inputEmail3">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" name="mail" class="form-control" id="inputEmail3" placeholder="Email">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputPassword1" class="col-sm-2 control-label">Mot de passe</label>
		    <div class="col-sm-10">
		      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Mot de passe">
		    </div>
		  </div>

		   <div class="form-group">
		    <label for="inputPassword2" class="col-sm-2 control-label">Confirmation</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="inputPassword2" placeholder="Confirmation mot de passe">
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">S'inscrire</button>
		    </div>
		  </div>
		</form>
	</div>
</div>
html;

return $html;

}