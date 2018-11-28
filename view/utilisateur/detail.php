<?php
    echo '<p>  Login : '. $ulogin .' <br> 
    Prenom : '. $uprenom .' <br>
    Nom : '. $unom .' <br>
    Adresse de facturation : '.$uadresseF.' <br>
    Adresse de livraison : '.$uadresseL.' <br>
    Identifiant de carte bleu : '.$uidCB.' <br> 
    Email : '.$uemail.'</p>';
    //if (Session::is_user($ulogin) || Session::is_admin()) {
        echo ('<a href="index.php?controller=utilisateur&action=delete&codeUtilisateur=' . rawurlencode($ucodeUtilisateur) . '" style="color:black"> <br> <p> Cliquez ici pour supprimer cette utilisateur ! </p> </a>');
        echo ('<a href="index.php?controller=utilisateur&action=update&codeUtilisateur=' . rawurlencode($ucodeUtilisateur) . '" style="color:black"> <p> Cliquez ici pour modifier cette utilisateur ! </p> </a>');
    //}
?>