<?php

include($ROOTPATH.'/app/database/db.php');

$table = "category";

$errors = array();
$categories = selectAll($table);

$category = '';
$cat_expand = '';

if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = "Suject Deleted Successfully";
    header('location:'. $BASE_URL. "artics.php");
    exit();
}

if(isset($_GET['u'])){
    $id = $_GET['u'];
    $list = selectOne($table, ['id' => $id]);
    $category = $list['category'];
    $cat_expand = $list['cat_expand'];
}

if (isset($_POST['submit_category'])){
    if (count($errors) === 0){
       //printD($_POST);
       unset($_POST['submit_category']);
            
   
       //printD($_POST);
       $post_id = create($table, $_POST);
       
       $_SESSION['message'] = "Post Created Successfully";
       header('location:'. $BASE_URL. "artics.php");
       exit();
    } else{
        $category = $_POST['category'];
        $cat_expand = $_POST['cat_expand'];
        
    }
}

if (isset($_POST['update_category'])){
    if (count($errors) === 0){
       //printD($_POST);
       $id = $_POST['id'];
       unset($_POST['update_category'], $_POST['id']);
            
   
       //printD($_POST);
       $post_id = update($table, $id, $_POST);
       
       $_SESSION['message'] = "Post Created Successfully";
       header('location:'. $BASE_URL. "artics.php");
       exit();
    } else{
        $category = $_POST['category'];
        $cat_expand = $_POST['cat_expand'];
        
    }
}