<form method="get" action="index.php">
  <fieldset>
    <legend><?php echo $type?> d'un utilisateur</legend>
    <p>
      
      <?php 

      $controller = static::$object;
      echo('<input type="hidden" name="controller" value="'.$controller.'"/>');

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
      }
      else if($_GET['action'] === 'update' /* && Session::is_admin() */) {
        echo('
        <input type="hidden" name="action" value="updated"/>
        <input type="text" value="'.$ucode.'" name="codeUtilisateur" id="codeUtilisateur_id" readonly required/>
        <input type="text" value="'.$ulogin.'" name="loginUtilisateur" id="loginUtilisateur_id" required/>
        <input type="text" value="'.$unom.'" name="nomUtilisateur" id="nomUtilisateur_id" required/>
        <input type="text" value="'.$uprenom.'" name="prenomUtilisateur" id="prenomUtilisateur_id" required/>
        <textarea name="adresseFacturationUtilisateur" id="adresseFacturationUtilisateur_id" > '.$uadresseF.' </textarea>
        <textarea name="adresseLivraisonUtilisateur" id="adresseLivraisonUtilisateur_id" > '.$uadresseL.' </textarea>
        <input type="password" value="'.$umdp.'" name="passUtilisateur" id="passUtilisateur_id" required/>
        <input type="password" value="'.$umdp.'" name="vpassUtilisateur" id="vpassUtilisateur_id" required/>
        <input type="email" value="'.$uemail.'" name="emailUser" id="emailUser_id" />');
      }
      
      ?>
    </p>
    <p>
      <input type="submit" <?php echo 'value=" '.$type.' d\'utilisateur !"'; ?> />
    </p>
  </fieldset> 
</form>