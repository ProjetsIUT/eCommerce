

<?php
    if(Session::is_admin()){
        echo '<h1>Détails de l\'utilisateur</h1>';
    }else{
        echo '<h1>Mon compte</h1>';
    }

    echo '<p>  Login : '. htmlspecialchars($ulogin) .' <br> 
    Prenom : '. htmlspecialchars($uprenom) .' <br>
    Nom : '. htmlspecialchars($unom) .' <br>
    Adresse de facturation : '.htmlspecialchars($uadresseF).' <br>
    Adresse de livraison : '.htmlspecialchars($uadresseL).' <br>
    Identifiant de carte bleu : '.htmlspecialchars($uidCB).' <br> 
    Email : '.htmlspecialchars($uemail).' <br>
    <a class="bouton" href="./index.php?controller=cartesBleues&action=readAll">Voir les moyens de paiement</a>
    <br>';
    if (Session::is_admin()) {
        echo 'Administrateur : '.htmlspecialchars($utype).' </p>';
    }
    else {
        echo '</p>';
    }

    if (Session::is_admin()) {
        echo ('<a class="bouton_red" href="index.php?controller=utilisateur&action=delete&loginUtilisateur=' . rawurlencode($ulogin) . '" > <br> <p> Cliquez ici pour supprimer cette utilisateur ! </p> </a>');
        echo ('<a class= "bouton" href="index.php?controller=utilisateur&action=update&loginUtilisateur=' . rawurlencode($ulogin) . '" > <p> Cliquez ici pour modifier cette utilisateur ! </p> </a>');
    }
    else if(Session::is_user($ulogin)) {
        echo ('<a class="bouton_red" href="index.php?controller=utilisateur&action=delete&loginUtilisateur=' . rawurlencode($ulogin) . '" > <br> <p> Cliquez ici pour supprimer votre compte ! </p> </a>');
        echo ('<a class= "bouton" href="index.php?controller=utilisateur&action=update&loginUtilisateur=' . rawurlencode($ulogin) . '" > <p> Cliquez ici pour modifier vos informations ! </p> </a>');
    }
    else if(Session::is_user($ulogin) && Session::is_admin()) {
        echo ('<a class="bouton_red" href="index.php?controller=utilisateur&action=delete&loginUtilisateur=' . rawurlencode($ulogin) . '" > <br> <p> Cliquez ici pour supprimer votre compte ! </p> </a>');
        echo ('<a class= "bouton" href="index.php?controller=utilisateur&action=update&loginUtilisateur=' . rawurlencode($ulogin) . '" > <p> Cliquez ici pour modifier vos informations ! </p> </a>');
    }


?>