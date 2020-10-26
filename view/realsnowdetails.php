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
        <table class="table">
            <tr>
                <th>code</th>
                <td><?= $snow['code'] ?></td>
            </tr>
            <tr>
                <th>length</th>
                <td><?= $snow['length'] ?></td>
            </tr>
            <tr>
                <th>state</th>
                <td><?= getTextState($snow['state']) ?></td>
            </tr>
            <tr>
                <th>available</th>
                <td><?= getTextAvailable($snow['available']) ?></td>
            </tr>
        </table>
    <a href="index.php?action=editSnowDetails&id=<?= $id ?>">Modifier</a>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
