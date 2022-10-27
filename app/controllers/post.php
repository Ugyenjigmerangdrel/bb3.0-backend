<?php

include($ROOTPATH.'/app/database/db.php');

$table = "post";
$categories = selectAll('category');
$errors = array();

$title = '';
$post = '';
$file = '';
$p_description = '';
$p_url = '';


if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = "Suject Deleted Successfully";
    header('location:'. $BASE_URL. "artics.php");
    exit();
}

if(isset($_GET['del_post'])){
    $post_url = $_GET['del_post'];
    $post = selectOne($table, ['url' => $post_url]);
    $path = $ROOTPATH . "/static/post/".$post['img'];
    unlink($path);
    $count = deletePost($table, $post_url);
    $count2 = deletePost('category_linking', $post_url);
    $_SESSION['message'] = "Result Deleted Successfully";
    header('location:'. $BASE_URL. "index.php");
    exit();
}

if(isset($_GET['p'])){
    $post = selectOne($table, ['id'=>$_GET['p']]);
    $pub = $post['published'];
    
    if ($pub == "not-publish"){
        $_POST['published'] = 'published';
        update($table, $_GET['p'], $_POST);
        header('location:'. $BASE_URL. "index.php");
    } else{
        $_POST['published'] = 'not-publish';
        update($table, $_GET['p'],  $_POST);
        header('location:'. $BASE_URL. "index.php");
    }
}

$content = selectAll($table);

$board = selectAll($table);


if(isset($_GET['u'])){
    $content_single = selectOne($table, ['url' => $_GET['u']]);

    $id = $content_single['id'];
    $title = $content_single['title'];
    $p_url = $content_single['url'];
    $p_description = $content_single['description'];
    $data = str_replace( '&', '&amp;', $content_single['post_content'] );
    $post = html_entity_decode($content_single['post_content']);
    $file = $content_single['img'];
}

if (isset($_POST['submit_post'])){
    //printD($_FILES['img']['name']); 
    //$errors = validateBlog($_POST);
    if (!empty($_FILES['img']['name'])){
        $file_name = time().'_'.$_FILES['img']['name'];
        $destination = $ROOTPATH . "/static/post/".$file_name;

        $result = move_uploaded_file($_FILES['img']['tmp_name'], $destination);
        //printD($result);
        if ($result){
            $_POST['img'] =  $file_name;
        }else{
            array_push($errors, "Failed to upload image");
        }


    } else{
        $_POST['img'] = '';
    }

    

    if (count($errors) === 0){
     
        $p_cat = $_POST['category'];
        $p_url = $_POST['url'];

        
        foreach($p_cat as $i => $value){
            global $conn;
        
            //echo $subject." ".$class."".$marks."<br>";

            $query = "INSERT INTO category_linking (category, url) VALUES ('$value','$p_url');";

            //printD($query);

            $query_run = mysqli_query($conn, $query); 
        }
        
        if($query_run){
            //printD($_POST);
            unset($_POST['submit_post'],$_POST['category']);
            
            $_POST['published'] = 'not-published';
            $_POST['category'] = 'ugyenjigmerangdrel';
            $_POST['post_content'] = htmlentities($_POST['post_content']);
        
            //printD($_POST);
            $post_id = create($table, $_POST);
            
            $_SESSION['message'] = "Post Created Successfully";
            header('location:'. $BASE_URL. "index.php");
            exit();
        }else{

        }
    } else{
        $title = $_POST['title'];
        $p_url = $_POST['url'];
        //$p_category = $_POST['category'];
        $p_description = $_POST['description'];

        $data = str_replace( '&', '&amp;', $_POST['post_content'] );
        $post = html_entity_decode($data);
    }
}

if(isset($_POST['update_post'])){
    //$errors = validateBlog($_POST);
    if (!empty($_FILES['img']['name'])){
        $file_name = time().'_'.$_FILES['img']['name'];
        $destination = $ROOTPATH . "/static/post/".$file_name;

        $result = move_uploaded_file($_FILES['img']['tmp_name'], $destination);
        if ($result){
            $_POST['img'] =  $file_name;
        }else{
            array_push($errors, "Failed to upload image");
        }

        $del_path =  $ROOTPATH . "/static/post/".$_POST['file_name'];
    
        unlink($del_path);


    } else{
        $_POST['img'] = $_POST['file_name'];
       
    }

    //printD($_POST['img']);
    if (count($errors) === 0) {
        $id = $_POST['id'];
        $_POST['published'] = 'published';
        $_POST['category'] = 'ugyenjigmerangdrel';
       

        unset($_POST['update_post'], $_POST['id'], $_POST['file_name']);
        //printD($_POST);
        $_POST['post_content'] = htmlentities($_POST['post_content']);
        
        $post_id = update($table, $id, $_POST);
        $_SESSION['message'] = "Post Updated Successfully created";
        header('location:'. $BASE_URL. "index.php");
    } else {
        $title = $_POST['title'];
        $p_url = $_POST['url'];
        //$p_category = $_POST['category'];
        $p_description = $_POST['description'];

        $data = str_replace( '&', '&amp;', $_POST['post_content'] );
        $post = html_entity_decode($data);
    }
}
