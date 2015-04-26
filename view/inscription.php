<?php

function formulaire($action){

	$html=<<<html
	<h3>Inscription</h3>
	<div id="formulaire">
		<form class="form-horizontal" action="$action" method="POST"> 
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
		    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" name="mail" class="form-control" id="inputEmail3" placeholder="Email">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">S'inscrire</button>
		    </div>
		  </div>
		</form>
	</div>
html;

return $html;

}