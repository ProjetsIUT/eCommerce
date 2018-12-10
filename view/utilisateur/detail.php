

<?php

    if(Session::is_admin()){

        echo '<h1>Détails de l\'utilisateur</h1>';


    }else{

        echo '<h1>Mon compte</h1>';
    }

    echo '
        <p>  Login : '. htmlspecialchars($ulogin) .' <br> 
        Prenom : '. htmlspecialchars($uprenom) .' <br>
        Nom : '. htmlspecialchars($unom) .' <br>
        Adresse de facturation : '.htmlspecialchars($uadresseF).' <br>
        Adresse de livraison : '.htmlspecialchars($uadresseL).' <br>
        Email : '.htmlspecialchars($uemail).


        '
        <br>
        <br>
        <a class="bouton" href="./index.php?controller=cartesBleues&action=readAll">Voir les moyens de paiement</a>
        <br>

    </p>';


    if (Session::is_user($ulogin) || Session::is_admin()) {



        echo ('

               <a class="bouton_red" href="index.php?controller=utilisateur&action=delete&loginUtilisateur=' . rawurlencode($ulogin) . '">Supprimer le compte</a>

            ');
        echo ('<a class= "bouton" href="index.php?controller=utilisateur&action=update&loginUtilisateur=' . rawurlencode($ulogin) . '">Modifier les informations</a>');
    

    }

?>