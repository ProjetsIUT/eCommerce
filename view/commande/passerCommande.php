<?php

	if(empty($_SESSION['loginUtilisateur'])){

		header("Location: ./index.php?action=connect&controller=utilisateur");
	} 

?>

<form id="passer_commande" action="./index.php">

		<input type="hidden" name="controller" value="commande">
 
		<input type="hidden" name="action" value="validerCommande">



		<?php 

		$tab_cartes_bleues = ModelCartesBleues::selectByUser();

		echo '

		<input type="hidden" name="prixTotal" value="'.$_GET["montant"] . '">
		<input type="hidden" value="'.$_GET["montant"] . '">

		<h1>Validation et paiement</h1>
		<br>

		 <a> Livrer à: '. $_SESSION['prenomUtilisateur'] . '</a>
		 <a>' .$_SESSION['nomUtilisateur'] . '</a>
		 <br>
		 <a>Au: </a>
		 <input name="adresse" value="' . $_SESSION['adresseL'] . '" readonly>
		 <br>
		 <a>Payer avec la carte N°: </a>

		 <select name="carte" required /> '	;

						foreach($tab_cartes_bleues as $carte) {

 
						 	$value = htmlspecialchars($carte->get('codeCarteBleue'));	
						
							echo' <option value="'.$value .'">'.$value.'</option>';
					
						}

					
		echo '

		</select>

		 <br>
		 <label>Payer en</label>
		 <input type="number" name="fois" min="1" max="3" value="1">
		 <label>fois</label>
		 <strong class="total">Montant total: ' . $_GET["montant"] . '€</strong>
		 <br>

	     <a  href="./index.php?controller=utilisateur&action=update&loginUtilisateur=' . $_SESSION['loginUtilisateur'] . '">Modifier les informations de livraison</a>
	     <br>
	     <a href="./index.php?controller=cartesBleues&action=readAll">Gérer les cartes bleues</a> 


		 ';


	?>

	<input type="submit" value="Valider la commande" class="submit_btn" style="float:right;">
	<br>
	<br>
	<a>En cliquant sur "Valider la commande", j'accepte de me faire escroquer sans conditions</a>




</form>