<?php
ob_start();
$title = 'Rent-a-snow Connexion'
?>

<form action="index.php?action=login" method="post">
    <div class="form-group">
        <label for="email">email</label>
        <input type="text" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="form-control" required>
</div>
<button type="submit" class="btn btn-primary">Connexion</button>
</form>

<?php
$content = ob_get_clean();
require  'gabarit.php';
?>