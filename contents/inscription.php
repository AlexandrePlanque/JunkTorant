<?php session_start(); ?>

<?php if(isset($_COOKIE['username'])): ?>
    <p>Vous êtes déjà connecté et donc inscrit, vous n'avez rien à foutre ici.</p>
<?php elseif(isset($_SESSION['test'])):?>

<?php else: ?>
<?php endif ?>
<div class="inscription" id="sign">
<form action="./scripts/inscription.php" method="post">
    <div>
        <label for="name">Nom :*</label>
        <input type="text" id="signin" name="user_name"><div id="errorField">
        </div>
    </div>
    <div>
        <label for="fn">Prénom :*</label>
        <input id="fn" name="user_fn">
    </div>
    <div>
        <label for="mail">E-mail :*</label>
        <input type="email" id="mail" name="user_mail">
    </div>
    <div class="button">
        <button type="submit">Valider l'inscription</button>
    </div>
</form>
</div>

