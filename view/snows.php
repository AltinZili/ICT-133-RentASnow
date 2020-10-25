<?php
    ob_start();
    $title = 'Rent-a-snow - Snowboards';
?>

    <div class="row-fluid">
        <h1>Nos Snowboards:</h1>
        <div class="snows">
            <?php foreach ($snows as $snow) { ?>
            <div class="snow">
                <img src="view/images/<?= $snow['photo'] ?>" class="listimages" alt=""><br>
                <a href="index.php?action=snowDetails&id=<?= $snow['id'] ?>"><?= $snow['brand'] ?><?= $snow['model'] ?></a>
            </div>
            <?php } ?>
        </div>
    </div>


<?php
    $content = ob_get_clean();
    require 'gabarit.php';
?>
