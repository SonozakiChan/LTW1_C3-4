<?php
require_once "config.php";

class DB_type{
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
        $name = $_POST['type_name'];
        $image = $_FILES['fileUpload'];
        $image_name = $image['name'];
        $image_type = $image['type'];

        if($name == null || strlen($name) > 50){
            $isError = true;
            $_SESSION['error_type']['type_name'] = "Bạn phải nhập vào tên hãng";
        }else
        {
            unset($_SESSION['error_type']['type_name']);
            $_SESSION['old_type']['type_name'] = $name;
        }

        if($image_name == null){
            $isError = true;
            $_SESSION['error_type']['fileUpload'] = "Bạn phải upload hình ảnh";
        }
        else if($image_type == 'image/jpeg' || $image_type == 'image/png'){
            unset($_SESSION['error_type']['fileUpload']);
        }
        else if($image_type != 'image/jpeg' || $image_type != 'image/png')
        {
            $isError = true;
            $_SESSION['error_type']['fileUpload'] = "Bạn phải upload hình có đuôi .jpeg, .png";
        }


        if($isError){
            header('Location: form_type.php');
        }else{
            move_uploaded_file($_FILES['fileUpload']['tmp_name'],'public/images/type/'.$image_name);
            $sql = "INSERT INTO `protypes`(`type_ID`, `type_name`, `type_img`) VALUES (null,'$name','$image_name')";
            $types = self::$conn->query($sql);
            unset($_SESSION['old_type']);
            unset($_SESSION['error_type']);
            header('Location: protypes.php');
        }
    }

    public function edit($id){
        $sql = "SELECT * FROM protypes WHERE type_ID = $id";
        $type = self::$conn->query($sql);

        return $this->toArray($type)[0];
    }
    public function Type_UploadToStore($id){
        $isError = false;
        $name = $_POST['type_name'];
        $image = $_FILES['fileUpload'];
        $image_name = $image['name'];
        $image_type = $image['type'];

        if($name == null || strlen($name) > 50){
            $isError = true;
            $_SESSION['error_type2']['type_name'] = "Bạn phải nhập vào tên hãng";
        }else
        {
            unset($_SESSION['error_type2']['type_name']);
            $_SESSION['old_type2']['type_name'] = $name;
        }

        if($image_name == null){
            unset($_SESSION['error_type2']['fileUpload']);
        }else if($image_type == 'image/jpeg' || $image_type == 'image/png')
        {
            unset($_SESSION['error_type2']['fileUpload']);
        }
        else{
            $isError = true;
            $_SESSION['error_type2']['fileUpload'] = "Bạn phải upload hình có đuôi .jpeg, .png";
        }

        if($isError){
            header('Location: edit_type.php?id='.$id);
        }else{
            if($image_name != null){
                unlink('public/images/type/'.$_POST['fileOld']);
                move_uploaded_file($_FILES['fileUpload']['tmp_name'],'public/images/type/'.$image_name);
            }else{
                $image_name = $_POST['fileOld'];
            }
            $sql = "UPDATE `protypes` SET type_name='$name',type_img='$image_name' WHERE type_ID=$id";
            $products = self::$conn->query($sql);
            unset($_SESSION['old_type2']);
            unset($_SESSION['error_type2']);
            header('Location: protypes.php');
        }
    }
    //xóa hãng
    public function delete($id)
    {
        $sql = "SELECT type_img FROM protypes WHERE type_ID = $id";
        $type = self::$conn->query($sql);
        $image_link = $this->toArray($type)[0]['type_img'];

        unlink('public/images/type/'.$image_link);
        $sql = "DELETE FROM protypes WHERE type_ID = $id";
        $type = self::$conn->query($sql);
    }
}