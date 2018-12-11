<h1> Vos cartes bleues enregistrées </h1>

<?php
	
	$i=1;

	foreach ($tab_cartes as $carte) {
		
	

		echo '
			<div class="div_cb">
				<h2>Carte N°'. htmlspecialchars($i) .'</h2>
				<a>Code carte bleue:'. htmlspecialchars($carte->get('codeCarteBleue')) .'</a>
				<br>
				<a>Date d\'expiration:'.htmlspecialchars($carte->get('dateExp')) . '</a>
				<br>
				<a>Cryptogramme: ' . htmlspecialchars($carte->get('cryptogramme')) .'</a>
				<br>
				<a>Nom du titulaire :' . htmlspecialchars($carte->get('nomTitulaire')) . '</a>
				<br>
				<br>
				<a class="bouton_red" href="./index.php?controller=cartesBleues&action=delete&code='.htmlspecialchars($carte->get('codeCarteBleue')).'">Supprimer</a>

			</div>

		';

		$i++;	

	}

	echo '

	 <a class="bouton" href="./index.php?controller=cartesBleues&action=create">Ajouter une nouvelle carte bleue</a>

	'
?>