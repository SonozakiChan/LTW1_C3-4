<?php
session_start();
require_once "check_authetication.php";
require_once "DB_manu.php";
$obj = new DB_manu();
$manu = $obj->edit($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mobile Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="public/css/uniform.css" />
    <link rel="stylesheet" href="public/css/select2.css" />
    <link rel="stylesheet" href="public/css/matrix-style.css" />
    <link rel="stylesheet" href="public/css/matrix-media.css" />
    <link href="public/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Master - Top-->
<?php require_once "View/all-div.php"?>

<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
        <h1>Edit ManuFacture</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Product Detail</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <!-- BEGIN USER FORM -->
                        <form action="Manu_UploadToStore.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $manu['manu_ID']; ?>">
                            <input type="hidden" name="fileOld" value="<?php echo $manu['manu_img']; ?>">
                            <div class="control-group">
                                <label class="control-label">Manufacture Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Manufacture name" name="manu_name" value="<?php echo (isset($_SESSION['old_manu2']['manu_name']))?$_SESSION['old_manu2']['manu_name']:$manu['manu_name'] ?>"/> *<br>
                                    <?php echo (isset($_SESSION['error_manu2']['manu_name']))?"<div class=\"alert alert-error\" style=\"margin-top:10px;\">".$_SESSION['error_manu2']['manu_name']."</div>":''?>
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">Choose an image :</label>
                                <div class="controls">
                                    <input type="file" name="fileUpload" id="fileUpload">
                                    <?php echo (isset($_SESSION['error_manu2']['fileUpload']))?"<div class=\"alert alert-error\" style=\"margin-top:10px;\">".$_SESSION['error_manu2']['fileUpload']."</div>":''?>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                    </div>

                    </form>
                    <!-- END USER FORM -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- END CONTENT -->
<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2017 &copy; TDC - Lập trình web 1</div>
</div>
<!--end-Footer-part-->
<script src="public/js/jquery.min.js"></script>
<script src="public/js/jquery.ui.custom.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/jquery.uniform.js"></script>
<script src="public/js/select2.min.js"></script>
<script src="public/js/jquery.dataTables.min.js"></script>
<script src="public/js/matrix.js"></script>
<script src="public/js/matrix.tables.js"></script>
</body>
</html>
