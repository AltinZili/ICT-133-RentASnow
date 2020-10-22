<?php
require_once 'model/model.php';

// This file contains nothing but functions

function homePage()
{
    $news = getNews();
    require_once 'view/home.php';
}

function snowsPage()
{
    $snows = getSnows();
    require_once 'view/snows.php';
}

function snowDetailsPage($id)
{
    $snow = getSnow($id);
    require_once 'view/snowdetails.php';
}

?>
