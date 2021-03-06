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
    $snowtype = getSnow($id);
    $snows = getSnowsOfType($id);
    require_once 'view/snowdetails.php';
}

function realSnowDetailsPage($id)
{
    $snow = getRealSnow($id);
    $rents = getRentsOfsnow($id);
    require_once 'view/realsnowdetails.php';
}

function editSnowDetailsPage($id)
{
    $snow = getRealSnow($id);
    require_once 'view/editsnowdetails.php';
}

function putInCart($id)
{
    $snow = getRealSnow($id);
    $_SESSION['cart'][] = $snow;
    withdrawSnow($id);
    $_SESSION['flashmessage'] = 'ajouté dans le panier';
    return;
}

function rentSnows($cartContent){
    $rentid = createRent($_SESSION['user']['id']);

    foreach($cartContent as $snow)
    {
        addSnowToRent($snow, $rentid);
    }

    unset($_SESSION['cart']);
    $_SESSION['flashmessage'] = 'Location enregistrée';
    snowsPage();
}

function loginPage()
{
    require_once 'view/login.php';
}

function tryLogin($email, $password)
{
    $user = getUserByEmail($email, $password);

    if(password_verify($password, $user['password'])){
        unset($user['password']);
        $_SESSION['user'] = $user;
        $_SESSION['flashmessage'] = 'Bonjour '. $_SESSION['user']['firstname'];
        require_once 'view/home.php';
    } else {
        unset($_SESSION['user']);
        $_SESSION['flashmessage'] = "Pas d'accord";
        require_once 'view/login.php';
    }
}

function logout()
{
    unset($_SESSION['user']);
    session_destroy();
    homePage();
}
?>
