<?php
    ob_start();
    $title = "Rent-a-Snow - Détails";
    require_once 'helpers.php';
?>

<div class="row-fluid text-center">
    <h1>Détails du Snowboard</h1>
        <div>
            <img src="view/images/<?= $snow['photo'] ?>" class="detailsimages" alt="">
            <h3>Marque: <?= $snow['brand'] ?></h3>
            <h3>Modèle: <?= $snow['model'] ?></h3>
        </div>
    <br>
    <form method="post" action="index.php?action=saveSnowDetails">
        <table class="table">
            <tr>
                <th>code</th>
                <td><input type="text" name="code" value="<?= $snow['code'] ?>"></td>
            </tr>
            <tr>
                <th>length</th>
                <td><input type="number" name="length" value="<?= $snow['length'] ?>"></td>
            </tr>
            <tr>
                <th>state</th>
                <td>
                    <select name="state">
                        <option value="1" <?= ($snow['state'] == 1) ? "selected" : "" ?>>Neuf</option>
                        <option value="2" <?= ($snow['state'] == 2) ? "selected" : "" ?>>Usagé</option>
                        <option value="3" <?= ($snow['state'] == 3) ? "selected" : "" ?>>Vieux</option>
                        <option value="4" <?= ($snow['state'] == 4) ? "selected" : "" ?>>Mort</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>available</th>
                <td><input type="checkbox" name="available" <?= ($snow['available'] == 1) ? 'checked' : ''?>></td>
            </tr>
        </table>
    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="submit" class="btn btn-succes">Enregistrer</button>
</form>
</div>



<?php
$content = ob_get_clean();
require "gabarit.php";
?>
