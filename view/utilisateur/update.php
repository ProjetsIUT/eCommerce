<form method="get" action="index.php">
  <fieldset>
    <legend><?php echo htmlspecialchars($type)?> d'un utilisateur</legend>
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
        <textarea name="adresseFacturationUtilisateur" id="adresseFacturationUtilisateur_id" > Adresse de facturation </textarea>
        <textarea name="adresseLivraisonUtilisateur" id="adresseLivraisonUtilisateur_id" > Adresse de livraison </textarea>
        <input type="password" placeholder="Mot de passe" name="passUtilisateur" id="passUtilisateur_id" required/>
        <input type="password" placeholder="Confirmer le mot de passe" name="vpassUtilisateur" id="vpassUtilisateur_id" required/>
        <input type="email" placeholder="example@gmail.com" name="emailUser" id="emailUser_id" />');
        if(Session::is_admin()) {}
      }
      else if($_GET['action'] === 'update') {
        echo('
        <input type="hidden" name="action" value="updated"/>
        <input type="text" value="'.htmlspecialchars($ulogin).'" name="loginUtilisateur" id="loginUtilisateur_id" readonly required/>
        <input type="text" value="'.htmlspecialchars($unom).'" name="nomUtilisateur" id="nomUtilisateur_id" required/>
        <input type="text" value="'.htmlspecialchars($uprenom).'" name="prenomUtilisateur" id="prenomUtilisateur_id" required/>
        <textarea name="adresseFacturationUtilisateur" id="adresseFacturationUtilisateur_id" > '.htmlspecialchars($uadresseF).' </textarea>
        <textarea name="adresseLivraisonUtilisateur" id="adresseLivraisonUtilisateur_id" > '.htmlspecialchars($uadresseL).' </textarea>
        <input type="password" placeholder="Mot de passe" name="passUtilisateur" id="passUtilisateur_id" required/>
        <input type="password" placeholder="Confirmer le mot de passe" name="vpassUtilisateur" id="vpassUtilisateur_id" required/>
        <input type="email" value="'.htmlspecialchars($uemail).'" name="emailUser" id="emailUser_id" />');
      }
      else if($_GET['action'] === 'created') {
        echo('
        <input type="hidden" name="action" value="created"/>
        <p> '.$verif.' </p>
        <input type="text" value="'.htmlspecialchars($_GET['loginUtilisateur']).'" name="loginUtilisateur" id="loginUtilisateur_id" required/>
        <input type="text" value="'.htmlspecialchars($_GET['nomUtilisateur']).'" name="nomUtilisateur" id="nomUtilisateur_id" required/>
        <input type="text" value="'.htmlspecialchars($_GET['prenomUtilisateur']).'" name="prenomUtilisateur" id="prenomUtilisateur_id" required/>
        <textarea name="adresseFacturationUtilisateur" id="adresseFacturationUtilisateur_id" > '.htmlspecialchars($_GET['adresseFacturationUtilisateur']).' </textarea>
        <textarea name="adresseLivraisonUtilisateur" id="adresseLivraisonUtilisateur_id" > '.htmlspecialchars($_GET['adresseLivraisonUtilisateur']).' </textarea>
        <input type="password" placeholder="Mot de passe" name="passUtilisateur" id="passUtilisateur_id" required/>
        <input type="password" placeholder="Confirmer le mot de passe" name="vpassUtilisateur" id="vpassUtilisateur_id" required/>
        <input type="email" value="'.htmlspecialchars($_GET['emailUser']).'" name="emailUser" id="emailUser_id" />');
      }
      else if ($_GET['action'] === 'updated') {
        echo('
        <input type="hidden" name="action" value="updated"/>
        <p> '.$verif.' </p>
        <input type="text" value="'.htmlspecialchars($_GET['loginUtilisateur']).'" name="loginUtilisateur" id="loginUtilisateur_id" required/>
        <input type="text" value="'.htmlspecialchars($_GET['nomUtilisateur']).'" name="nomUtilisateur" id="nomUtilisateur_id" required/>
        <input type="text" value="'.htmlspecialchars($_GET['prenomUtilisateur']).'" name="prenomUtilisateur" id="prenomUtilisateur_id" required/>
        <textarea name="adresseFacturationUtilisateur" id="adresseFacturationUtilisateur_id" > '.htmlspecialchars($_GET['adresseFacturationUtilisateur']).' </textarea>
        <textarea name="adresseLivraisonUtilisateur" id="adresseLivraisonUtilisateur_id" > '.htmlspecialchars($_GET['adresseLivraisonUtilisateur']).' </textarea>
        <input type="password" placeholder="Mot de passe" name="passUtilisateur" id="passUtilisateur_id" required/>
        <input type="password" placeholder="Confirmer le mot de passe" name="vpassUtilisateur" id="vpassUtilisateur_id" required/>
        <input type="email" value="'.htmlspecialchars($_GET['emailUser']).'" name="emailUser" id="emailUser_id" />');
      }
      
      
      ?>
    </p>
    <p>
      <input type="submit" <?php echo 'value=" '.htmlspecialchars($type).' d\'utilisateur !"'; ?> />
    </p>
  </fieldset> 
</form>