

<h1><?php echo $type?> de produit</h1>
<form method="get" action="index.php" id="form_update_create">
  
    <p>
      
      <?php 

      $controller = static::$object;
      echo('<input type="hidden" name="controller" value="'.$controller.'"/>');

      if($_GET['action'] === 'create') {
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
      else if($_GET['action'] === 'update' /* && Session::is_admin() */) {
        echo('
        <input type="hidden" name="action" value="updated"/>
        <label>Code produit</label>
        <input type="text" value="'.$codeP.'" name="codeProduit" id="codeProduit_id" readonly required/>

        <label>Nom du produit</label>
        <input type="text" value="'.$nomP.'" name="nomProduit" id="nomProduit_id" required/>
        <br>
        <label>Prix</label>
        <input type="number" value="'.$prixP.'" name="prixProduit" id="prixProduit_id" required/>
        <br>
        <label>Description</label>
        <br>
        <textarea name="descProduit" id="descProduit_id" required>'.$descP.'</textarea>
        <br>
        <label>Quantité actuellement en stock</label>
        
        <input type="number" value="'.$stockP.'" name="stockProduit" id="stockProduit_id" required/>');
      }
      else if ($_GET['action'] === 'created') {
        echo('
        <p> '.$verif.' </p>
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
      
      ?>
    </p>

    <div id="boutons_form">
      <input type="submit" value="Enregistrer" class="submit_btn">
      <a class="bouton_red" href="./index.php?action=readAll&controller=produit" >Annuler</a>
    
    </div>

</form>