<h1>Ajouter une carte bleue</h1>

<form id="form_cb" method="GET" action='./index.php?'>
	<input type="hidden" name="controller" value="cartesBleues">

	<input type="hidden" name="action" value="created">

	<?php

		if(Session::is_admin()){

			echo ' 

				<label> Login utilisateur : </label>

				 <select name="loginUtilisateur" required />

						';

							foreach($tab_user as $u) {

							  $value = htmlspecialchars($u->get('loginUtilisateur')) 	;					

							 echo' <option value="'.$value.'"' .'>'.$value.'</option>';
						
							}

						


				echo '</select> <br>';



		}else{

			echo '<input type="hidden" name="loginUtilisateur" value="' . htmlspecialchars($_SESSION['loginUtilisateur']) .'">' ;

		}

	?>

	<label>Code Carte Bleue:</label>
	<br>
	<input type="text" name="code" required >
	<br>
	<label>Date d'expiration (MM/AA): </label>
	<br>
	<input type="text" name="date"  required maxlength="5" >
	<br>
	<label>Cryptogramme:</label>
	<br>
	<input type="number" name="cryptogramme" max="999" required >
	<br>
	<label>Nom du titulaire:</label>
	<br>
	<input type="text" name="nom" required>

	<input class="submit_btn" type=submit value="Enregistrer">




</form>


