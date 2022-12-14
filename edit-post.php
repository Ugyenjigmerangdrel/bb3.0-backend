<?php 
include('path.php');

include($ROOTPATH . '/app/controllers/post.php');
adminOnly();
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

    <script src="https://626536dc302aa11d4aa250bf--ugyen-ck.netlify.app/build/ckeditor.js"></script>

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
                        <h1 class="h3 mb-0 text-gray-800">Artics/Add Post</h1>
                       
                    </div>


                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Create Post</h6>
                                        <div class="dropdown no-arrow">
                                           
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                    <form action="edit-post.php" class="needs-validation" enctype="multipart/form-data"  method="post" novalidate>
                                    <div class="form-group">
                                        <input type="hidden" name='id' value="<?php echo $id ?>">
                                        <label for="">Post Title:</label>
                                        <input type="text" name="title" value="<?php echo $title ?>" class="form-control" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="">Post URL:</label>
                                        <input type="text" name="url" value="<?php echo $p_url ?>"  class="form-control" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="">Post Short Description:</label>
                                        <input type="text" name="description" value="<?php echo $p_description ?>" class="form-control" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="">Post Image: Chosen: <?php echo $file ?><input type="hidden" name="file_name" value="<?php echo $file ?>"></label>
                                        <input type="file" name="img" value="<?php echo $file ?>" class="form-control" >
                                    </div>
                                    <br>
                                        <div class="form-group">
                                            <label for="">Author</label>
                                            <select name="author" class="form-control" id="" required>
                                                <option value="">---</option>
                                                <option value="Ugyen Jigme Rangdrel">Ugyen Jigme Rangdrel</option>
                                                <option value="Jamyang Ugyen Tshomo">Jamyang Ugyen Tshomo</option>
                                                <option value="Shacha">Shacha</option>
                                                <option value="Khamsum Wangchuk">Khamsum Wangchuk</option>
                                            </select>
                                        </div>
                                    <br>
                                    
                                    <div class="form-group">
                                        <label for="">Post Content:</label>
                                        <textarea id="editor" class="ckEditor"  name="post_content" required><?php echo $post ?></textarea>
                                    </div>
                                    <br>
                                    <button name="update_post" class="btn btn-primary p-2">Submit Post</button>
                                    </form>
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
                        <span>Copyright &copy; Bhutan Breakthrough 2021</span>
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
                        <span aria-hidden="true">??</span>
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

<script>
        ClassicEditor
                    .create(document.querySelector( '#editor' ), {
        
                        fontFamily: {
                            options: [
                                'default',
                                'Ubuntu, Arial, sans-serif',
                                'Ubuntu Mono, Courier New, Courier, monospace'
                            ]
                        },
                        toolbar: {
                            items: ['heading', '|', 'insertImage','bold', 'italic', 'underline', 'fontFamily', 'undo', 'redo',
                            'fontSize', , 'fontFamily', 'fontColor', 'fontBackgroundColor', 'htmlEmbed', 'link', 'insertTable', 
                            'mediaEmbed', 'bulletedList', 'numberedList', '|','MathType', 'blockQuote', 'specialCharacters'],
                            shouldNotGroupWhenFull: true
                        },
                        image: {
                            // You need to configure the image toolbar, too, so it uses the new style buttons.
                            toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight', 'imageStyle:alignCenter'],
        
                            styles: [
                                // This option is equal to a situation where no style is applied.
                                'full',
                                'side',
                                'alignCenter',
                                // This represents an image aligned to the left.
                                'alignLeft',
                                // This represents an image aligned to the right.
                                'alignRight'
                            ]
                        }
                    })
                    .then(editor => {
                        // This place loads the adapter.
                        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                            return new UploadAdapter(loader);
                        };
                    })
                    .catch(error => {
                        console.error(error);
                    });
        </script>
    
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>

</html>