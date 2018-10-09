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

        //hien tat ca san pham
        public function show(){
		    $sql = "SELECT *,manufactures.manu_name,protypes.type_name FROM products 
                    INNER JOIN manufactures ON manufactures.manu_id = products.manu_id
                    INNER JOIN protypes ON protypes.type_id = products.type_id ORDER BY ID DESC";
		    $products = self::$conn->query($sql);

            return $this->toArray($products);
        }
        //tim kiem san pham theo id
        public function find($id){
            $sql = "SELECT *,manufactures.manu_name,protypes.type_name FROM products 
                    INNER JOIN manufactures ON manufactures.manu_id = products.manu_id
                    INNER JOIN protypes ON protypes.type_id = products.type_id where products.id = $id";
            $products = self::$conn->query($sql);

            return $this->toArray($products);
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
            $sql = "DELETE FROM `products` WHERE ID = $id";
            $products = self::$conn->query($sql);
        }

        //hien tat ca hang san xuat
        public function showManu(){
            $sql = "SELECT manu_ID,manu_name FROM manufactures ORDER BY manu_id desc ";
            $products = self::$conn->query($sql);
            return $this->toArray($products);
        }
        //hien tat ca loai san pham
        public function showType(){
            $sql = "SELECT type_id,type_name FROM protypes ORDER BY type_id desc ";
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
        //ham tao ra cac nut pre - next
        public function firstOrLastPage($url,$page,$text)
        {
            return "<li class='active'><a href='$url?page=$page'> $text </a></li>";
        }
        public function preBtn($page,$url)
        {
            $page--;
            return "<li class='active'><a href='$url?page=$page'> < </a></li>";
        }
        public function nextBtn($page,$url)
        {
            $page++;
            return "<li class='active'><a href='$url?page=$page'> > </a></li>";
        }

        //ham tao ra cac dots phan trang
        public function paginate($url, $total, $page, $per_page, $offset)
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
            for ($j = $from; $j <= $to; $j++) {
                if ($j == $page)
                {
                    $link = $link."<li class='active'><a href='$url?page=$j'> $j </a></li>";
                }else{
                    $link = $link."<li><a href='$url?page=$j'> $j </a></li>";
                }
            }
            return $link;
        }
    }
?>