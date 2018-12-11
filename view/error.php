<!DOCTYPE html>
<!-- -->
<html>
	<!--Hors de page-->
    <head>
    	<link rel="icon" href="Images/logoananas.ico" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="HTML/styles.css">
		<title><?php echo $pagetitle; ?></title>		<!--Titre affiché sur l'onglet-->

       

    </head>
    
	<!--Corps de page (propre à chaque page)-->

		<!--Pour l'en-tête de page-->
		<header>
		<header>
			<nav> <!--Menu-->
				<div class=menu_burger>
					<a> <img src="./Images/logoananas.png" alt="Ca fonctionne pas nulos" id="logobg"></a>
					<div class="submenu_bg">
						<div><a class=txt_sub href="index.php">Accueil</a></div>
						<br>
						<div><a class=txt_sub href="index.php?action=readAll&controller=produit">Produits</a></div>
						<div><a class=txt_sub href="index.php?action=show_panier&controller=utilisateur">Panier</a></div>
						<?php
						if(Session::is_admin()) {
							echo '<div><a class=txt_sub href="index.php?action=readAll&controller=utilisateur">Utilisateurs</a></div>
							<div><a class=txt_sub href="index.php?action=readAll&controller=commande">Historique des commandes</a></div>';
						}
						else if (isset($_SESSION['loginUtilisateur'])){
							echo '<div><a class=txt_sub href="index.php?action=read&controller=utilisateur&loginUtilisateur='.$_SESSION['loginUtilisateur'].'">Mon Compte</a></div>
							<div><a class=txt_sub href="index.php?action=readAll&controller=commande">Historique des commandes</a></div>';
						}

                    	if(isset($_SESSION['loginUtilisateur'])) {
							echo ('<div><a class=txt_sub href="index.php?controller=utilisateur&action=deconnect">Se déconnecter</a></div>');
                    	}
                    	else {
							echo ('<div><a class=txt_sub href="index.php?action=create&controller=utilisateur">S\'inscrire</a></div>
							<div><a class=txt_sub href="index.php?action=connect&controller=utilisateur">Se connecter</a></div>');
                    	}
                    	?>
					</div>
				</div>
			

				<div class=menu>
					<a href="index.php"><img src="./Images/logoananas.png" alt="Ca fonctionne pas nulos" id="logo"></a>			
					<div class=title_menu><a class=txt_menu href="index.php?action=readAll&controller=produit">Produits</a></div>
					<div class=title_menu><a class=txt_menu href="index.php?action=show_panier&controller=utilisateur">Panier</a></div>
					<?php
					if(Session::is_admin()) {
						echo '<div class=title_menu><a class=txt_menu href="index.php?action=readAll&controller=utilisateur">Utilisateurs</a></div>
						<div class=title_menu><a class=txt_menu href="index.php?action=readAll&controller=commande">Historique des commandes</a></div>
';
					}
					else if(isset($_SESSION['loginUtilisateur'])){
						echo '<div class=title_menu><a class=txt_menu href="index.php?action=read&controller=utilisateur&loginUtilisateur='.$_SESSION['loginUtilisateur'].'">Mon Compte</a></div>
						<div class=title_menu><a class=txt_menu href="index.php?action=readAll&controller=commande">Historique des commandes</a></div>
';
					}

					if(isset($_SESSION['loginUtilisateur'])) {
						echo ('<div class=title_menu><a class=txt_menu href="index.php?controller=utilisateur&action=deconnect">Se déconnecter</a></div>');
					}
					else {
						echo ('<div class=title_menu><a class=txt_menu href="index.php?action=create&controller=utilisateur">S\'inscrire</a></div>
						<div class=title_menu><a class=txt_menu href="index.php?action=connect&controller=utilisateur">Se connecter</a></div>');
					}
					?>
				</div>
			
			</nav>
		</header>
    <body>
		<main>
			<?php
			// Si $controleur='voiture' et $view='list',
			// alors $filepath="/chemin_du_site/view/voiture/list.php"
            echo '<p> Erreur de la fonction '.$error_code.' pour l\'objet '.self::$object.'
                <p>Redirection vers la page d\'accueil...</p>
            <meta http-equiv="refresh" content="5; URL=index.php" />';
			?>
			</main>
    </body>
		<footer>
			<div class="FootBot">
				<div class="FootBotC1">
					<div>
						<a> <img src="./Images/logoananas2.png" alt="Erreur 2ème logo" id="FootAnanas"></a>
					</div>
				</div>
				<div class="FootBotC2">
					<h1>Tout le monde en parle !</h1>
				</div>
			
				<div class="FootBotC3">
					<h1>A propos de PineApple</h1>
					<h5>PineApple est une entreprise <br>spécialisée dans les nouvelles technologies. 
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