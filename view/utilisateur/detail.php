

<?php
    if(Session::is_admin()){
        echo '<h1>Détails de l\'utilisateur '.htmlspecialchars($ulogin).'</h1>';
    }else{
        echo '<h1>Mon compte</h1>';
    }
    
    echo '<p>  Login : '. htmlspecialchars($ulogin) .' <br> 
    Prenom : '. htmlspecialchars($uprenom) .' <br>
    Nom : '. htmlspecialchars($unom) .' <br>
    Adresse de facturation : '.htmlspecialchars($uadresseF).' <br>
    Adresse de livraison : '.htmlspecialchars($uadresseL).' <br>
    Email : '.htmlspecialchars($uemail).' <br>';
    if (Session::is_admin()) {
        echo 'Administrateur : '.htmlspecialchars($utype).' </p>';
    }
    else {
        echo '</p>';
    }
    
    echo '<a class="bouton" href="index.php?controller=cartesBleues&action=readAll">Voir les moyens de paiement</a>';

    if (Session::is_admin()) {
        echo ('<br> <br> <br><a class="bouton_red" href="index.php?controller=utilisateur&action=delete&loginUtilisateur=' . rawurlencode($ulogin) . '" >  Cliquez ici pour supprimer cette utilisateur !  </a>');
        echo ('<br> <br> <br><a class= "bouton" href="index.php?controller=utilisateur&action=update&loginUtilisateur=' . rawurlencode($ulogin) . '" > Cliquez ici pour modifier cette utilisateur ! </a>');
    }
    else if(Session::is_user($ulogin)) {
        echo ('<br> <br> <br><a class="bouton_red" href="index.php?controller=utilisateur&action=delete&loginUtilisateur=' . rawurlencode($ulogin) . '" > Cliquez ici pour supprimer votre compte !  </a>');
        echo ('<br> <br> <br><a class= "bouton" href="index.php?controller=utilisateur&action=update&loginUtilisateur=' . rawurlencode($ulogin) . '" >  Cliquez ici pour modifier vos informations !  </a>');
    }
    else if(Session::is_user($ulogin) && Session::is_admin()) {
        echo ('<br> <br> <br><a class="bouton_red" href="index.php?controller=utilisateur&action=delete&loginUtilisateur=' . rawurlencode($ulogin) . '" > Cliquez ici pour supprimer votre compte ! </a>');
        echo ('<br> <br> <br><a class= "bouton" href="index.php?controller=utilisateur&action=update&loginUtilisateur=' . rawurlencode($ulogin) . '" > Cliquez ici pour modifier vos informations ! </a>');
    }


?>