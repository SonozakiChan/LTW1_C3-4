<?php
	require_once "config.php";
	class Db{

		public static $conn;
		public function __construct(){
			self::$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			self::$conn->set_charset('utf8');
		}
        public function __destruct(){
            self::$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        }

        public function toArray($obj){
		    $arr = [];
		    while ($row = $obj->fetch_assoc()){
		        $arr[] = $row;
            }
            return $arr;
        }

        //them san pham
        public function store(){
            $isError = false;
            $name = $_POST['name'];
            $price = $_POST['price'];
            $desc = $_POST['description'];
            $type_id = $_POST['type_id'];
            $manu_id = $_POST['manu_id'];
            $image = $_FILES['fileUpload'];
            $image_name = $image['name'];
            $image_type = $image['type'];

            if($name == null || strlen($name) > 50){
                $isError = true;
                $_SESSION['error']['name'] = "Bạn phải nhập vào tên sản phẩm,tối đa 50 ký tự !!!";
            }else
            {
                unset($_SESSION['error']['name']);
                $_SESSION['old']['name'] = $name;
            }

            if($price == null || strlen($price) > 50){
                $isError = true;
                $_SESSION['error']['price'] = "Bạn phải nhập vào giá,tối đa 50 ký tự !!!";
            }else
            {
                unset($_SESSION['error']['price']);
                $_SESSION['old']['price'] = $price;
            }

            if($desc == null || strlen($desc) > 250){
                $isError = true;
                $_SESSION['error']['description'] = "Bạn phải nhập vào mô tả,tối đa 250 ký tự !!!";
            }else
            {
                unset($_SESSION['error']['description']);
                $_SESSION['old']['description'] = $desc;
            }

            if($image_name == null){
                $isError = true;
                $_SESSION['error']['fileUpload'] = "Bạn phải upload hình ảnh";
            }else if($image_type != 'image/jpeg' || $image_type != 'image/png')
            {
                unset($_SESSION['error']['fileUpload']);
            }
            else{
                $isError = true;
                $_SESSION['error']['fileUpload'] = "Bạn phải upload hình có đuôi .jpeg, .png";
            }

            if($isError){
                header('Location: form.php');
            }else{
                move_uploaded_file($_FILES['fileUpload']['tmp_name'],'public/images/'.$image_name);
                $sql = "INSERT INTO `products`(`ID`, `name`, `price`, `image`, `description`, `manu_ID`, `type_ID`) VALUES (null,'$name',$price,'$image_name','$desc',$manu_id,$type_id)";

                $products = self::$conn->query($sql);
                unset($_SESSION['old']);
                unset($_SESSION['error']);
                header('Location: index.php');
            }

        }
        //hien tat ca san pham
        public function show(){
		    $sql = "SELECT *,manufactures.manu_name,protypes.type_name FROM products 
                    INNER JOIN manufactures ON manufactures.manu_id = products.manu_id
                    INNER JOIN protypes ON protypes.type_id = products.type_id ORDER BY ID DESC";
		    $products = self::$conn->query($sql);

            return $this->toArray($products);
        }
        //tim kiem san pham theo id
        public function edit($id){
            $sql = "SELECT *,manufactures.manu_name,protypes.type_name FROM products 
                    INNER JOIN manufactures ON manufactures.manu_id = products.manu_id
                    INNER JOIN protypes ON protypes.type_id = products.type_id where products.id = $id";
            $products = self::$conn->query($sql);

            return $this->toArray($products);
        }

        //up vao csdl
        public function uploadToStore($id){
            $isError = false;
            $name = $_POST['name'];
            $price = $_POST['price'];
            $desc = $_POST['description'];
            $type_id = $_POST['type_id'];
            $manu_id = $_POST['manu_id'];
            $image = $_FILES['fileUpload'];
            $image_name = $image['name'];
            $image_type = $image['type'];

            if($name == null || strlen($name) > 50){
                $isError = true;
                $_SESSION['error2']['name'] = "Bạn phải nhập vào tên sản phẩm,tối đa 50 ký tự !!!";
            }else
            {
                unset($_SESSION['error2']['name']);
                $_SESSION['old2']['name'] = $name;
            }

            if($price == null || strlen($price) > 50){
                $isError = true;
                $_SESSION['error2']['price'] = "Bạn phải nhập vào giá,tối đa 50 ký tự !!!";
            }else
            {
                unset($_SESSION['error2']['price']);
                $_SESSION['old2']['price'] = $price;
            }

            if($desc == null || strlen($desc) > 250){
                $isError = true;
                $_SESSION['error2']['description'] = "Bạn phải nhập vào mô tả,tối đa 250 ký tự !!!";
            }else
            {
                unset($_SESSION['error2']['description']);
                $_SESSION['old2']['description'] = $desc;
            }

            if($image_name == null){
                unset($_SESSION['error2']['fileUpload']);
            }else if($image_type == 'image/jpeg' || $image_type == 'image/png')
            {
                unset($_SESSION['error2']['fileUpload']);
            }
            else{
                $isError = true;
                $_SESSION['error2']['fileUpload'] = "Bạn phải upload hình có đuôi .jpeg, .png";
            }

            if($isError){
                header('Location: edit.php?id='.$id);
            }else{
                if($image_name != null){
                    unlink('public/images/'.$_POST['fileOld']);
                    move_uploaded_file($_FILES['fileUpload']['tmp_name'],'public/images/'.$image_name);
                }else{
                    $image_name = $_POST['fileOld'];
                }
                $sql = "UPDATE `products` SET `name`='$name',`price`='$price',`image`='$image_name',`description`='$desc',`manu_ID`='$manu_id',`type_ID`=$type_id WHERE id=$id";

                $products = self::$conn->query($sql);
                unset($_SESSION['old2']);
                unset($_SESSION['error2']);
                header('Location: index.php');
            }
        }

        public function find_name($key){
            $sql = "SELECT *,manufactures.manu_name,protypes.type_name FROM products 
                    INNER JOIN manufactures ON manufactures.manu_id = products.manu_id
                    INNER JOIN protypes ON protypes.type_id = products.type_id
                    where products.name LIKE $key";
            $products = self::$conn->query($sql);

            return $this->toArray($products);
        }
        //xoa 1 san pham
        public function delete($id){
            $sql = "SELECT image FROM products WHERE id = $id";
            $products = self::$conn->query($sql);
            $image_link = $this->toArray($products)[0]['image'];

            unlink('public/images/'.$image_link);
            $sql = "DELETE FROM `products` WHERE ID = $id";
            $products = self::$conn->query($sql);
        }

        //hien tat ca hang san xuat
        public function showManu(){
            $sql = "SELECT * FROM manufactures ORDER BY manu_id desc ";
            $products = self::$conn->query($sql);
            return $this->toArray($products);
        }
        //hien tat ca loai san pham
        public function showType(){
            $sql = "SELECT * FROM protypes ORDER BY type_id desc ";
            $products = self::$conn->query($sql);
            return $this->toArray($products);
        }

        //ham phan trang san pham
        public function limitProduct($total, $per_page, $page)
        {
            $first_link = ($page - 1) * $per_page;
            $sql = "SELECT *,manufactures.manu_name,protypes.type_name FROM products 
                    INNER JOIN manufactures ON manufactures.manu_id = products.manu_id
                    INNER JOIN protypes ON protypes.type_id = products.type_id ORDER BY ID DESC LIMIT $first_link,$per_page";
            $products = self::$conn->query($sql);
            return $this->toArray($products);
        }

        //ham phan trang san pham - tim kiem
        public function limitProductKey($total,$per_page,$page,$key){
            $first_link = ($page - 1) * $per_page;
            $sql = "SELECT *,manufactures.manu_name,protypes.type_name FROM products 
                    INNER JOIN manufactures ON manufactures.manu_id = products.manu_id
                    INNER JOIN protypes ON protypes.type_id = products.type_id where products.name LIKE $key ORDER BY ID DESC LIMIT $first_link,$per_page";
            $products = self::$conn->query($sql);
            return $this->toArray($products);
        }
        //ham tao ra cac nut pre - next
        public function firstOrLastPage($url,$page,$text,$now_page,$total_links,$key)
        {
            if(($now_page == 1 && $text == '<<') || ($now_page == $total_links && $text == '>>'))
            {
                return null;
            }
            if($key != null){
                $key = '&key='.$key;
            }else{$key = '';}
            
            return "<li class='active'><a href='$url?page=$page$key'> $text </a></li>";
        }
        public function preBtn($page,$url,$key)
        {
            if($page == 1){
                return null;
            }
            $page--;
            if($key != null){
                $key = '&key='.$key;
            }else{$key = '';}
            return "<li class='active'><a href='$url?page=$page$key'> < </a></li>";
        }
        public function nextBtn($page,$url,$max_page,$key)
        {
            if($page == $max_page){
                return null;
            }
            $page++;

            if($key != null){
                $key = '&key='.$key;
            }else{$key = '';}
            return "<li class='active'><a href='$url?page=$page$key'> > </a></li>";
        }

        //ham tao ra cac dots phan trang
        public function paginate($url, $total, $page, $per_page, $offset,$key)
        {
            if($total <= 0) {return "";}
            $total_links = ceil($total/$per_page);
            if($total_links <= 1) {return "";}

            $from = $page - $offset;
            $to = $page + $offset;
            //$offset qui định số lượng link hiển thị ở 2 bên trang hiện hành

            if($from <= 0) {
                $from = 1;
                $to = $offset * 2;
            }
            if($to > $total_links) {
                $to = $total_links;
            }
            $link = "";
            if($key != null){
                $key = '&key='.$key;
            }else{$key = '';}

            for ($j = $from; $j <= $to; $j++) {
                if ($j == $page)
                {
                    $link = $link."<li class='active'><a href='$url?page=$j$key'> $j </a></li>";
                }else{
                    $link = $link."<li><a href='$url?page=$j$key'> $j </a></li>";
                }
            }
            return $link;
        }
    }
?>