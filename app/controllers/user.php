<?php 

include($ROOTPATH . "/app/database/db.php");


$errors = array();

$username = '';
$email = '';
$password = '';

$table = 'user';

$user_d = selectAll($table);




function loginUser($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['message'] = 'Sucessfully Logged In';
    $_SESSION['type'] = 'success';

    header('location:'.$BASE_URL. "index.php");
    
    exit();
}

if (isset($_POST['login'])) {
    

    if (count($errors) === 0){
        $user = selectOne($table, ['email' => $_POST['email']]);

        if ($user && password_verify($_POST['password'], $user['password'])){
            //login and redirect
            loginUser($user);
        } else{
            $email = $_POST['email'];
            $password = '';
            $psm = 'Wrong Credientials';
        }
    }
}  