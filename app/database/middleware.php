<?php

function loggedinuser($redirect = 'index.php'){
    if (!empty($_SESSION['id'])) {
        header('location:'.$BASE_URL.$redirect);
        exit(0);
    } 
    
}

function adminOnly($redirect = 'login.php'){
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You Are Not Authorized';
        header('location:'. $BASE_URL. $redirect);
        printD('location:'. $BASE_URL. $redirect);
        exit(0);
    } 
}

function guestOnly($redirect = 'index.php'){
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You Cannot Access';
        header('location:'.$BASE_URL.$redirect);
        exit(0);
    } 
}