<!DOCTYPE html>
<!-- -->
<html>
 oui oui oui 
	<!--Hors de page-->
    <head>
    	<link rel="icon" href="Images/logoananas.ico" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<title>PineApple</title>		<!--Titre affiché sur l'onglet-->

       

    </head>
    
	<!--Corps de page (propre à chaque page)-->
    <body>
		<!--Pour l'en-tête de page-->
		<header>
			<nav> <!--Menu-->
				<div class=menu_burger>
					<a> <img src="./Images/logoananas.png" alt="Ca fonctionne pas nulos" id="logobg"></a>
					<div class="submenu_bg">
						<div><a class=txt_sub href="index.html">Accueil</a></div>
						<br>
						<div><a class=txt_sub href="pd5.html">Produits</a></div>
						<br>
						<div><a class=txt_sub href="contact.html">Contact</a></div>
						<br>
						<div><a class=txt_sub href="equipe.html">Équipe</a></div>
						<br>
						<div><a class=txt_sub href="presse.html">Presse</a></div>
						<br>
						<div><a class=txt_sub href="nous_rejoindre.html">Nous rejoindre</a></div>
						<br>
						<div><a class=txt_sub href="faq.html">FAQ</a></div>
						<br>
					</div>
				</div>
			
				<div class=menu>
					<a href="index.html"><img src="./Images/logoananas.png" alt="Ca fonctionne pas nulos" id="logo"></a>			
					<div class=title_menu><a class=txt_menu href="pd5.html">Produits</a>
						<div class="submenu">
							<div><a class=txt_sub href="pd5.html">PD5 Phone</a></div>
							<div><a class=txt_sub href="pinetabs.html">PineTabs</a></div>
							<div><a class=txt_sub href="pinewatch.html">PineWatch</a></div>
						</div>
				</div>
				<div class=title_menu><a class=txt_menu href="contact.html">Contact</a>
					<div class="submenu">
						<div><a class=txt_sub href="contact.html">Formulaire</a></div>
						<div><a class=txt_sub href="magasins.html">Trouver un magasin</a></div>
					</div>
				</div>
				<div class=title_menu><a class=txt_menu href="equipe.html">Equipe</a>
					<div class="submenu">
						<div><a class=txt_sub  href="equipe.html">Présentation</a></div>
						<div><a class=txt_sub href="nous_rejoindre.html">Nous rejoindre</a></div>
					</div>
				</div>
				<div class=title_menu><a class=txt_menu href="presse.html">Presse</a>
					<div class="submenu">
						<div><a class=txt_sub  href="presse.html">Articles</a></div>
						<div><a class=txt_sub href="temoignages.html">Témoignages</a></div>
					</div>
				</div>

				<div class=title_menu><a class=txt_menu href="faq.html">FAQ</a></div>
			
				</div>
			
			</nav>
		</header>
    <body>
			<?php
			// Si $controleur='voiture' et $view='list',
			// alors $filepath="/chemin_du_site/view/voiture/list.php"
			$filepath = File::build_path(array("view", $controller, "$view.php"));
			require $filepath;
			?>
    </body>
		<footer>
			<section>
				<div class="TitreFoot">Consultez notre meilleur produit en ce moment en magasin !</div>
				<h6><a href="pd5.html" id="FootPD5">PD5</a></h6>
			</section>
			<div class="FootBot">
				<div class="FootBotC1">
					<div>
						<a> <img src="./Images/logoananas2.png" alt="J'vous aime ptn" id="FootAnanas"></a>
					</div>
					<div>
						<h5><a href="contact.html">Nous contacter</a> pour 
						<br> vous éclairer dès 
						<br> maintenant sur nos 
						<br> produits PineApple</h5>
					</div>
				</div>
				<div class="FootBotC2">
					<h1>Tout le monde en parle !</h1>
					<h5>Découvrez les <a href="presse.html">articles</a> <br> et <a href="temoignages.html">témoignages</a><br> nous concernant</h5>
				</div>
			
				<div class="FootBotC3">
					<h1>A propos de PineApple</h1>
					<h5>PineApple est une entreprise <br>spécialisée dans les nouvelles technologies. 
					Quatre associés en sont les pilliers :<br> Yaël - Damien - Barthélémy - Alexandre
					</h5>
					<a href="http://jigsaw.w3.org/css-validator/check/referer">
						<img style="border:0;width:88px;height:31px"
						src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
						alt="CSS Valide !" />
					</a>

				</div>
			</div>
			<p>

		</footer>
 
</html>



