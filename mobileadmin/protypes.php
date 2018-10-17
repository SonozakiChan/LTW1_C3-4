<?php
session_start();
require_once "check_authetication.php";
require_once "DB.php";
require_once "DB_type.php";
$obj = new DB();
$obj_manu = new DB_type();
$show = $obj->showType();

//xoa 1 san pham
if(isset($_GET['delete_id'])){
    $obj_manu->delete($_GET['delete_id']);
    unset($_GET['delete_id']);
    header('Location: protypes.php');
}
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
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
        <h1>Manage Producer</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a href="form_manufacture.php"><i class="icon-plus"></i></a></span>
                        <h5>Types</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Type_Id</th>
                                <th>Type_Name</th>
                                <th>Type_image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($show as $value): ?>
                                <tr class="">
                                    <td><?php echo $value['type_ID']?></td>
                                    <td><?php echo $value['type_name']?></td>
                                    <td><img src="public/images/type/<?php echo $value['type_img']?>" style="width:100px"></td>
                                    <td>
                                        <a href="edit_type.php?id=<?php echo $value['type_ID']?>" class="btn btn-success btn-mini">Edit</a>
                                        <a href="protypes.php?delete_id=<?php echo $value['type_ID']?>" class="btn btn-danger btn-mini">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
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
