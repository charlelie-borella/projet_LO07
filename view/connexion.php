<?php
//Formulaire de connexion
function formulaireConnexion($action){
  $html=<<<html
  <div id="body">
    <h3 class="titre">Connexion</h3>
    <div id="formulaire">
      <form class="form-horizontal" action="$action" method="POST">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="mail" name="mail" class="form-control" id="inputEmail3" placeholder="Email">
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
          <div class="checkbox">
            <label>
              <input type="checkbox"> Se souvenir de moi
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Se connecter</button>
        </div>
      </div>
     </form>
    </div>
  </div>
html;

  return $html;
}
