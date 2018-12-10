<form method="get" action="index.php">
  <fieldset>
    <legend><?php echo htmlspecialchars($type)?></legend>
    <p>
      
      <?php 

      $controller = static::$object;
      echo('<input type="hidden" name="controller" value="'.htmlspecialchars($controller).'"/>');

      if($_GET['action'] === 'create') {
        echo('
        <input type="hidden" name="action" value="created"/>
        <input type="text" placeholder="Login" name="loginUtilisateur" id="loginUtilisateur_id" required/>
        <input type="text" placeholder="Nom" name="nomUtilisateur" id="nomUtilisateur_id" required/>
        <input type="text" placeholder="Prenom" name="prenomUtilisateur" id="prenomUtilisateur_id" required/>
        <br>
        <label>Adresse de facturation:</label>
        <br>
        <textarea name="adresseFacturationUtilisateur" id="adresseFacturationUtilisateur_id" > Adresse de facturation </textarea>
        <br>
        <label>Adresse de livraison:</label>
        <br>
        <textarea name="adresseLivraisonUtilisateur" id="adresseLivraisonUtilisateur_id" > Adresse de livraison </textarea>
        <br>
        <input type="password" placeholder="Mot de passe" name="passUtilisateur" id="passUtilisateur_id" required/>
        <input type="password" placeholder="Confirmer le mot de passe" name="vpassUtilisateur" id="vpassUtilisateur_id" required/>
        <input type="email" placeholder="example@gmail.com" name="emailUser" id="emailUser_id" />');
        if(Session::is_admin()) {
          echo '<label for="typeUser_id">Administrateur</label>
          <select name="typeUser" id="typeUsers_id" size="1" required>
              <option value="1"> Oui
              <option value="0"> Non 
          </select>';
        }
      }
      else if($_GET['action'] === 'update') {
        echo('
        <input type="hidden" name="action" value="updated"/>
        <input type="text" value="'.htmlspecialchars($ulogin).'" name="loginUtilisateur" id="loginUtilisateur_id" readonly required/>
        <input type="text" value="'.htmlspecialchars($unom).'" name="nomUtilisateur" id="nomUtilisateur_id" required/>
        <input type="text" value="'.htmlspecialchars($uprenom).'" name="prenomUtilisateur" id="prenomUtilisateur_id" required/>
        <br>
        <label>Adresse de facturation:</label>
        <br>
        <textarea name="adresseFacturationUtilisateur" id="adresseFacturationUtilisateur_id" > '.htmlspecialchars($uadresseF).' </textarea>
        <br>
        <label>Adresse de livraison:</label>
        <br>
        <textarea name="adresseLivraisonUtilisateur" id="adresseLivraisonUtilisateur_id" > '.htmlspecialchars($uadresseL).' </textarea>
        <br>
        <input type="password" placeholder="Mot de passe" name="passUtilisateur" id="passUtilisateur_id" required/>
        <input type="password" placeholder="Confirmer le mot de passe" name="vpassUtilisateur" id="vpassUtilisateur_id" required/>
        <input type="email" value="'.htmlspecialchars($uemail).'" name="emailUser" id="emailUser_id" />');
        if(Session::is_admin()) {
          if($utype == 1) {
            $dec = '<option value="1"> Oui
            <option value="0"> Non'; 
          }
          else {
            $dec = '<option value="0"> Non
            <option value="1"> Oui';
          }
          echo '<label for="typeUser_id">Administrateur</label>
          <select name="typeUser" id="typeUsers_id" size="1" required>
              '.$dec.'
          </select>';
        }
      }
      else if($_GET['action'] === 'created') {
        echo('
        <input type="hidden" name="action" value="created"/>
        <p> '.$verif.' </p>
        <input type="text" value="'.htmlspecialchars($_GET['loginUtilisateur']).'" name="loginUtilisateur" id="loginUtilisateur_id" required/>
        <input type="text" value="'.htmlspecialchars($_GET['nomUtilisateur']).'" name="nomUtilisateur" id="nomUtilisateur_id" required/>
        <input type="text" value="'.htmlspecialchars($_GET['prenomUtilisateur']).'" name="prenomUtilisateur" id="prenomUtilisateur_id" required/>
        <br>
        <label>Adresse de facturation:</label>
        <br>
        <textarea name="adresseFacturationUtilisateur" id="adresseFacturationUtilisateur_id" > '.htmlspecialchars($_GET['adresseFacturationUtilisateur']).'</textarea>
        <br>
        <label>Adresse de livraison:</label>
        <br>
        <textarea name="adresseLivraisonUtilisateur" id="adresseLivraisonUtilisateur_id" > '.htmlspecialchars($_GET['adresseLivraisonUtilisateur']).' </textarea>
        <br>
        <input type="password" placeholder="Mot de passe" name="passUtilisateur" id="passUtilisateur_id" required/>
        <input type="password" placeholder="Confirmer le mot de passe" name="vpassUtilisateur" id="vpassUtilisateur_id" required/>
        <input type="email" value="'.htmlspecialchars($_GET['emailUser']).'" name="emailUser" id="emailUser_id" />');
        if(Session::is_admin()) {
          if($_GET['typeUser'] == 1) {
            $dec = '<option value="1"> Oui
            <option value="0"> Non'; 
          }
          else {
            $dec = '<option value="0"> Non
            <option value="1"> Oui';
          }
          echo '<label for="typeUser_id">Administrateur</label>
          <select name="typeUser" id="typeUsers_id" size="1" required>
              '.$dec.'
          </select>';
        }
      }
      else if ($_GET['action'] === 'updated') {
        echo('
        <input type="hidden" name="action" value="updated"/>
        <p> '.$verif.' </p>
        <input type="text" value="'.htmlspecialchars($_GET['loginUtilisateur']).'" name="loginUtilisateur" id="loginUtilisateur_id" required/>
        <input type="text" value="'.htmlspecialchars($_GET['nomUtilisateur']).'" name="nomUtilisateur" id="nomUtilisateur_id" required/>
        <input type="text" value="'.htmlspecialchars($_GET['prenomUtilisateur']).'" name="prenomUtilisateur" id="prenomUtilisateur_id" required/>
        <br>
        <label>Adresse de facturation:</label>
        <br>
        <textarea name="adresseFacturationUtilisateur" id="adresseFacturationUtilisateur_id" > '.htmlspecialchars($_GET['adresseFacturationUtilisateur']).'</textarea>
        <label>Adresse de livraison:</label>
        <br>
        <textarea name="adresseLivraisonUtilisateur" id="adresseLivraisonUtilisateur_id" > '.htmlspecialchars($_GET['adresseLivraisonUtilisateur']).' </textarea>
        <br>
        <input type="password" placeholder="Mot de passe" name="passUtilisateur" id="passUtilisateur_id" required/>
        <input type="password" placeholder="Confirmer le mot de passe" name="vpassUtilisateur" id="vpassUtilisateur_id" required/>
        <input type="email" value="'.htmlspecialchars($_GET['emailUser']).'" name="emailUser" id="emailUser_id" />');
        if(Session::is_admin()) {
          if($_GET['typeUser'] == 1) {
            $dec = '<option value="1"> Oui
            <option value="0"> Non'; 
          }
          else {
            $dec = '<option value="0"> Non
            <option value="1"> Oui';
          }
          echo '<label for="typeUser_id">Administrateur</label>
          <select name="typeUser" id="typeUsers_id" size="1" required>
              '.$dec.'
          </select>';
        }
      }
      
      
      ?>
    </p>
    <p>
      <input class="submit_btn" type="submit"value="Enregistrer" />
    </p>
  </fieldset> 
</form>