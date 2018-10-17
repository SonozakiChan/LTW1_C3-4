<?php

    session_start();
    require_once "check_authetication.php";
    require_once "config.php";
    require_once "Db.php";

    $per_page = 5;// hiển thị 5 sản phẩm trên 1 trang
    $page = (isset($_GET['page']))?$_GET['page']:1;// Lấy số trang trên thanh địa chỉ
    $url = $_SERVER['PHP_SELF']; // lấy đường dẫn đến file hiện hành
    $objProduct = new Db();
    $total = count($objProduct->show());
    $total_links = ceil($total/$per_page);
    $show = $objProduct->limitProduct($url,$per_page,$page); // show[] all san pham


    //xoa 1 san pham
    if(isset($_GET['delete_id'])){
        $objProduct->delete($_GET['delete_id']);
        unset($_GET['delete_id']);
        header('Location: index.php');
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
	<style type="text/css">
		ul.pagination{
			list-style: none;
			float: right;
		}
		ul.pagination li.active{
			font-weight: bold;
		}
		ul.pagination li{
		  float: left;
		  display: inline-block;
		  padding: 10px;
		}
        .sanpham img{
            width: 350px;
            height: 150px;
        }
	</style>
</head>
<body>

<!--Master - Top-->
<?php require_once "View/all-div.php"?>

<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
		<h1>Manage Products</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><a href="form.html"> <i class="icon-plus"></i> </a></span>
						<h5>Products</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th></th>
								<th>Name</th>
								<th>Category</th>
								<th>Producer</th>
								<th>Description</th>
								<th>Price (VND)</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($show as $value): ?>
                                <tr class="sanpham">
                                    <td><img src="public/images/<?php echo $value['image']?>" /></td>
                                    <td><?php echo $value['name']?></td>
                                    <td><?php echo $value['type_name']?></td>
                                    <td><?php echo $value['manu_name']?></td>
                                    <td><?php echo $value['description']?></td>
                                    <td><?php echo $value['price']?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $value['ID']?>" class="btn btn-success btn-mini">Edit</a>
                                        <a href="index.php?delete_id=<?php echo $value['ID']?>" class="btn btn-danger btn-mini">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
						</tbody>
						</table>
						<ul class="pagination">
							<?php echo  $objProduct->firstOrLastPage($url,1,"<<",$page,$total_links,'').$objProduct->preBtn($page,$url,'').$objProduct->paginate($url,$total,$page,$per_page,2,'').$objProduct->nextBtn($page,$url,$total_links,'').$objProduct->firstOrLastPage($url,$total_links,">>",$page,$total_links,''); ?>
						</ul>
						
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

