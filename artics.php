<?php 
include('path.php');

include($ROOTPATH . '/app/controllers/category.php');

$posts = selectAll('post');

if(isset($_GET['p'])){
    $post = selectOne('post', ['id'=>$_GET['p']]);
    $pub = $post['published'];
    
    if ($pub == "unpublish"){
        $_POST['published'] = 'publish';
        update('post', $_GET['p'], $_POST);
        header('location:'. $BASE_URL. "artics.php");
    } else{
        $_POST['published'] = 'unpublish';
        update('post', $_GET['p'],  $_POST);
        header('location:'. $BASE_URL. "artics.php");
    }
}

if(isset($_GET['del_post'])){
    $post_url = $_GET['del_post'];
    $post = selectOne('post', ['url' => $post_url]);
    $path = $ROOTPATH . "/static/post/".$post['img'];
    unlink($path);
    $count = deletePost('post', $post_url);
    $count2 = deletePost('category_linking', $post_url);
    $_SESSION['message'] = "Result Deleted Successfully";
    header('location:'. $BASE_URL. "artics.php");
    exit();
}

if(isset($_GET['u'])){
    $content_single = selectOne('post', ['url' => $_GET['u']]);

    $id = $content_single['id'];
    $title = $content_single['title'];
    $p_url = $content_single['url'];
    $p_description = $content_single['description'];
    $data = str_replace( '&', '&amp;', $content_single['post_content'] );
    $post = html_entity_decode($content_single['post_content']);
    $file = $content_single['img'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bhutan Breakthrough - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php  include('components/sidebar.php') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include("components/header.php") ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Artics Dashboard</h1>
                       
                    </div>

                     <!-- Content Row -->
                     <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Posts</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">24</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Unpublished Posts</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pen fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Published Post
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">24</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Date</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18 Oct </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                        <!-- Content Row -->

                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Content Links</h6>
                                        <div class="dropdown no-arrow">
                                           
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
            
                                                    <th>Post Title</th>
                                                    <th>Published Status</th>
                                                    <th>Author</th>
                                                    <th>Posted On</th>
                                                    <th>Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($posts as $key => $value): ?>
                                                <tr>
                                               
                                                <td><?php echo $value['title'] ?></td>
                                                
                                                <td><a href="artics.php?p=<?php echo $value['id'] ?>"><?php echo $value['published'] ?></a></td>
                                                <td><?php echo $value['author'] ?></td>
                                                <td><?php echo $value['created_on'] ?></td>
                                                
                                                <td><div><a href="" class="p-2 me-2 mb-3">Preview</a></div>
                                                <div><a href="edit-post.php?u=<?php echo $value['url']?>" class="p-2 me-2 mb-3">Edit</a></div>
                                            <div><a href="?del_post=<?php echo $value['url'] ?>" class="p-2 text-danger me-2 mb-3">Remove</a></div></td>

                                            </tr>
                                            <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pie Chart -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                                        <div class="dropdown no-arrow">
                                            
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                           <th></th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                    <?php foreach($categories as $key => $value): ?>
                                        <tr>
                                     
                                        <td><?php echo $value['category'] ?></td>
                                        
                                        <td><?php echo $value['cat_expand'] ?></td>
                                        
                                        <td><a href="edit-category.php?u=<?php echo $value['id']?>" class="p-2 text-info me-2 mb-3"><i class="fa fa-pen"></i></a><a href="?del_id=<?php echo $value['id'] ?>" class="p-2 me-2 mb-3"><i class="text-danger fa fa-trash"></i></a></td>

                                    </tr>
                                    <?php endforeach ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                                    </div>
                                </div>
                            </div>
                            </div>


                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>