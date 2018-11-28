<form method="get" action="index.php">
    <fieldset>

    <legend>Connexion</legend>

    <?php

    echo('
    <input type="hidden" name="controller" value="utilisateur"/>
    <input type="hidden" name="action" value="connected"/>
    <input type="text" placeholder="Login"  name="login" id="login_id" required/>
    <input type="password" placeholder="Mot de passe" name="mdp" id="mdp_id" required/>
    <input type="submit" value="Se connecter"/> ');

    ?>
    </fieldset>
</form>