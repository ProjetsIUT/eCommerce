<form method="get" action="index.php">
  <fieldset>
    <legend><?php echo $type?> de produit</legend>
    <p>
      
      <?php 

      $controller = static::$object;
      echo('<input type="hidden" name="controller" value="'.$controller.'"/>');

      if($_GET['action'] === 'create') {
        echo('
        <input type="hidden" name="action" value="created"/>
        <input type="text" placeholder="Nom du produit" name="nomProduit" id="nomProduit_id" required/>
        <input type="text" placeholder="Prix du produit" name="prixProduit" id="prixProduit_id" required/>
        <textarea name="descProduit" id="descProduit_id" required> Description du produit </textarea>
        <input type="text" placeholder="Stock du produit" name="stockProduit" id="stockProduit_id" required/>');
      }
      else if($_GET['action'] === 'update' /* && Session::is_admin() */) {
        echo('
        <input type="hidden" name="action" value="updated"/>
        <input type="text" value="'.$codeP.'" name="codeProduit" id="codeProduit_id" readonly required/>
        <input type="text" value="'.$nomP.'" name="nomProduit" id="nomProduit_id" required/>
        <input type="text" value="'.$prixP.'" name="prixProduit" id="prixProduit_id" required/>
        <textarea name="descProduit" id="descProduit_id" required>'.$descP.'</textarea>
        <input type="text" value="'.$stockP.'" name="stockProduit" id="stockProduit_id" required/>');
      }
      
      ?>
    </p>
    <p>
      <input type="submit" <?php echo 'value=" '.$type.' de ce produit !"'; ?> />
    </p>
  </fieldset> 
</form>