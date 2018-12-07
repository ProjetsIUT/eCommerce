

<h1><?php echo $type?> de produit</h1>
<form method="get" action="index.php" id="form_update_create">
  
    <p>
      
      <?php 

      $controller = static::$object;
      echo('<input type="hidden" name="controller" value="'.htmlspecialchars($controller).'"/>');

      if($_GET['action'] === 'create' && Session::is_admin()) {
        echo('
        <input type="hidden" name="action" value="created"/>
        <label>Nom du produit</label>
        <input type="text" placeholder="Nom du produit" name="nomProduit" id="nomProduit_id" required/>
        <label>Prix</label>
        <input type="number" placeholder="Prix du produit" name="prixProduit" id="prixProduit_id" required/>
        <br>
        <label>Description</label>
        <br>
        <textarea name="descProduit" id="descProduit_id" required> Description du produit </textarea>
        <br>
        <label>Quantité actuellement en stock</label>
        <input type="number" placeholder="Stock du produit" name="stockProduit" id="stockProduit_id" required/>');
      }
      else if($_GET['action'] === 'update' && Session::is_admin()) {
        echo('
        <input type="hidden" name="action" value="updated"/>
        <label>Code produit</label>
        <input type="text" value="'.htmlspecialchars($codeP).'" name="codeProduit" id="codeProduit_id" readonly required/>

        <label>Nom du produit</label>
        <input type="text" value="'.htmlspecialchars($nomP).'" name="nomProduit" id="nomProduit_id" required/>
        <br>
        <label>Prix</label>
        <input type="number" value="'.htmlspecialchars($prixP).'" name="prixProduit" id="prixProduit_id" required/>
        <br>
        <label>Description</label>
        <br>
        <textarea name="descProduit" id="descProduit_id" required>'.htmlspecialchars($descP).'</textarea>
        <br>
        <label>Quantité actuellement en stock</label>
        
        <input type="number" value="'.htmlspecialchars($stockP).'" name="stockProduit" id="stockProduit_id" required/>');
      }
      else {
        echo('<p> Oups vous n\'avez le droit d\'être sur cette page si et seulement si vous êtes un administrateur </p>
        <meta http-equiv="refresh" content="3; URL=index.php?action=readAll&controller=produit" />');
      }
      
      ?>
    </p>

    <div id="boutons_form">
      <input type="submit" value="Enregistrer" class="submit_btn">
      <a class="bouton_red" href="./index.php?action=readAll&controller=produit" >Annuler</a>
    
    </div>

</form>