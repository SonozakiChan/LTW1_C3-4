<?php
require_once "config.php";

class DB_manu{

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

    //thêm hãng
    public function add(){
        $isError = false;
        $name = $_POST['manu_name'];
        $image = $_FILES['fileUpload'];
        $image_name = $image['name'];
        $image_type = $image['type'];

        if($name == null || strlen($name) > 50){
            $isError = true;
            $_SESSION['error_manu']['manu_name'] = "Bạn phải nhập vào tên hãng";
        }else
        {
            unset($_SESSION['error_manu']['manu_name']);
            $_SESSION['old_manu']['manu_name'] = $name;
        }

        if($image_name == null){
            $isError = true;
            $_SESSION['error_manu']['fileUpload'] = "Bạn phải upload hình ảnh";
        }
        else if($image_type == 'image/jpeg' || $image_type == 'image/png'){
            unset($_SESSION['error_manu']['fileUpload']);
        }
        else if($image_type != 'image/jpeg' || $image_type != 'image/png')
        {
            $isError = true;
            $_SESSION['error_manu']['fileUpload'] = "Bạn phải upload hình có đuôi .jpeg, .png";
        }


        if($isError){
            header('Location: form_manufacture.php');
        }else{
            move_uploaded_file($_FILES['fileUpload']['tmp_name'],'public/images/manu/'.$image_name);
            $sql = "INSERT INTO `manufactures`(`manu_ID`, `manu_name`, `manu_img`) VALUES (null,'$name','$image_name')";
            $manus = self::$conn->query($sql);
            unset($_SESSION['old_manu']);
            unset($_SESSION['error_manu']);
            header('Location: manufactures.php');
        }
    }
    public function edit($id){
        $sql = "SELECT * FROM manufactures WHERE manu_ID = $id";
        $manu = self::$conn->query($sql);

        return $this->toArray($manu)[0];
    }
    public function Manu_UploadToStore($id){
        $isError = false;
        $name = $_POST['manu_name'];
        $image = $_FILES['fileUpload'];
        $image_name = $image['name'];
        $image_type = $image['type'];

        if($name == null || strlen($name) > 50){
            $isError = true;
            $_SESSION['error_manu2']['manu_name'] = "Bạn phải nhập vào tên hãng";
        }else
        {
            unset($_SESSION['error_manu2']['manu_name']);
            $_SESSION['old_manu2']['manu_name'] = $name;
        }

        if($image_name == null){
            unset($_SESSION['error_manu2']['fileUpload']);
        }else if($image_type == 'image/jpeg' || $image_type == 'image/png')
        {
            unset($_SESSION['error_manu2']['fileUpload']);
        }
        else{
            $isError = true;
            $_SESSION['error_manu2']['fileUpload'] = "Bạn phải upload hình có đuôi .jpeg, .png";
        }

        if($isError){
            header('Location: edit_manu.php?id='.$id);
        }else{
            if($image_name != null){
                unlink('public/images/manu/'.$_POST['fileOld']);
                move_uploaded_file($_FILES['fileUpload']['tmp_name'],'public/images/manu/'.$image_name);
            }else{
                $image_name = $_POST['fileOld'];
            }
            $sql = "UPDATE `manufactures` SET manu_name='$name',manu_img='$image_name' WHERE manu_ID=$id";
            $products = self::$conn->query($sql);
            unset($_SESSION['old_manu2']);
            unset($_SESSION['error_manu2']);
            header('Location: manufactures.php');
        }
    }

    //xóa hãng
    public function delete($id)
    {
        $sql = "SELECT manu_img FROM manufactures WHERE manu_ID = $id";
        $manu = self::$conn->query($sql);
        $image_link = $this->toArray($manu)[0]['manu_img'];

        unlink('public/images/manu/'.$image_link);
        $sql = "DELETE FROM `manufactures` WHERE manu_ID = $id";
        $manu = self::$conn->query($sql);
    }
}
