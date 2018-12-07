<?php
    echo '<p>  Login : '. htmlspecialchars($ulogin) .' <br> 
    Prenom : '. htmlspecialchars($uprenom) .' <br>
    Nom : '. htmlspecialchars($unom) .' <br>
    Adresse de facturation : '.htmlspecialchars($uadresseF).' <br>
    Adresse de livraison : '.htmlspecialchars($uadresseL).' <br>
    Identifiant de carte bleu : '.htmlspecialchars($uidCB).' <br> 
    Email : '.htmlspecialchars($uemail).'</p>';
    if (Session::is_user($ulogin) || Session::is_admin()) {
        echo ('<a href="index.php?controller=utilisateur&action=delete&loginUtilisateur=' . rawurlencode($ulogin) . '" style="color:black"> <br> <p> Cliquez ici pour supprimer cette utilisateur ! </p> </a>');
        echo ('<a href="index.php?controller=utilisateur&action=update&loginUtilisateur=' . rawurlencode($ulogin) . '" style="color:black"> <p> Cliquez ici pour modifier cette utilisateur ! </p> </a>');
    }
?>