<form method="get" action="index.php">
  <fieldset>
    <legend>Modification d'utilisateur</legend>
    <p>
      
      <?php 

      $controller = static::$object;
      echo('<input type="hidden" name="controller" value="'.$controller.'"/>');

      if($_GET['action'] === 'create') {
        echo('
        <input type="hidden" name="action" value="created"/>
        <input type="text" placeholder="Login"  name="login" id="login_id" required/>
        <input type="password" placeholder="Mot de passe" name="mdp" id="mdp_id" required/>
        <input type="password" placeholder="Confirmer le mot de passe" name="vmdp" id="vmdp_id" required/>
        <input type="text" placeholder="Nom" name="nom" id="nom_id" required/>
        <input type="text" placeholder="Prenom" name="prenom" id="prenom_id" required/>
        <input type="email" placeholder="example@gmail.com" name="emaill" id="email_id" required/>');
      }
      else if($_GET['action'] === 'update' && Session::is_admin()) {
        echo('
        <input type="hidden" name="action" value="updated"/>
        <input type="text" value="'.htmlspecialchars($_GET['login']).'"  name="login" id="login_id" readonly required/>
        <input type="password" placeholder="Mot de passe" name="mdp" id="mdp_id" required/>
        <input type="password" placeholder="Confirmer le mot de passe" name="vmdp" id="vmdp_id" required/>
        <input type="text" value="'.htmlspecialchars($nom).'" name="nom" id="nom_id" required/>
        <input type="text" value="'.rawurlencode($prenom).'" name="prenom" id="prenom_id" required/>
        <input type="email" value="'.$email.'" name="email" id="email_id" required/>
        <label for="admin_id">Administrateur</label>
        <input type="checkbox" value="'.$admin.'" name="admin" id="admin_id" />');
      }
      
      ?>
    </p>
    <p>
      <input type="submit" value="Submit" />
    </p>
  </fieldset> 
</form>