<?php

include($ROOTPATH.'/app/database/db.php');

$table = "author";

$errors = array();
$authors = selectAll($table);

$name = '';
$description = '';
$role = '';
if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = "Suject Deleted Successfully";
    header('location:'. $BASE_URL. "team.php");
    exit();
}

if(isset($_GET['u'])){
    $id = $_GET['u'];
    $list = selectOne($table, ['id' => $id]);
    $name = $list['name'];
    $description = $list['description'];
    $role = $list['role'];
}

if (isset($_POST['submit_author'])){
    if (count($errors) === 0){
       //printD($_POST);
       unset($_POST['submit_author']);
            
   
       //printD($_POST);
       $post_id = create($table, $_POST);
       
       $_SESSION['message'] = "Team Member Added Successfully";
       header('location:'. $BASE_URL. "team.php");
       exit();
    } else{
        $name = $_POST['name'];
        $description = $_POST['description'];
        $role = $_POST['role'];
        
    }
}

if (isset($_POST['update_author'])){
    if (count($errors) === 0){
       //printD($_POST);
       $id = $_POST['id'];
       unset($_POST['update_author'], $_POST['id']);
            
   
       //printD($_POST);
       $post_id = update($table, $id, $_POST);
       
       $_SESSION['message'] = "Post Created Successfully";
       header('location:'. $BASE_URL. "team.php");
       exit();
    } else{
        $name = $_POST['name'];
        $description = $_POST['description'];
        $role = $_POST['role'];
    }
}