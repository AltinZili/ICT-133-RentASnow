<?php

session_start();

require "controler/controler.php";

if(isset($_GET['action'])){
    $action = $_GET['action'];
} else {
    $action = 'home';
}

switch($action){
    case 'home':
        homePage();
        break;
    case 'snows':
        snowsPage();
        break;
    case 'snowDetails':
        $idGet = $_GET['id'];
        snowDetailsPage($idGet);
        break;
    case 'loginPage':
        loginPage();
        break;
    case 'login':
        $emailPost = $_POST['email'];
        $passwordPost = $_POST['password'];
        tryLogin($emailPost, $passwordPost);
        break;
    case 'logout':
        logout();
        break;
}

?>
