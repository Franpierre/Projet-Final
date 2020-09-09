<?php
include 'header.php';
?>
<h1>Se connecter</h1>
    <form method="POST" action="user.php">
        <fieldset>
            <legend>Formulaire</legend>
                <label for="userName">Email ou nom d'utilisateur :</label>
                <input type="text" id="userName" name="userName" />
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" />
                <input type="submit" value="Valider" />
        </fieldset>
    </form>
<?php
include 'footer.php';
?>