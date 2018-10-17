<?php

require_once "config.php";
class DB_admin{

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

    public function login(){

        $sql = "SELECT username,pass FROM users";
        $users = self::$conn->query($sql);
        $users = $this->toArray($users);

        $isError = false;
        $username = $_POST['username'];
        $pass = $_POST['pass'];


        if ($username == null || strlen($username) > 50){
            $isError = true;
            $_SESSION['auth_error']['username'] = "Bạn phải nhập vào username, tối đa 50 ký tự";
        }else{
            $hasUsername = false;
            foreach ($users as $user){
                if ($username == $user['username']) $hasUsername = true;
            }
            if(!$hasUsername){
                $isError = true;
                $_SESSION['auth_error']['wrong'] = "Mật khẩu hoặc tài khoản không chính xác";
            }else{
                $_SESSION['auth']['username'] = $username;

            }
        }
        if ($pass == null || strlen($pass) > 50){
            $isError = true;
            $_SESSION['auth_error']['pass'] = "Bạn phải nhập vào username, tối đa 50 ký tự";
        }else{
            $hasPass = false;
            foreach ($users as $user){
                if ($pass == $user['pass']) $hasPass = true;
            }
            if(!$hasPass){
                $isError = true;
                $_SESSION['auth_error']['wrong'] = "Mật khẩu hoặc tài khoản không chính xác";
            }else{
                $_SESSION['auth']['pass'] = $pass;

            }
        }
        if ($isError){
            header("Location: login.php");
        }else{
            header("Location: ../index.php");
        }
    }
    public function check(){
        if(isset($_SESSION['auth'])){

        }
        else{
            header("Location: ../mobileadmin/Admin/login.php");
        }
    }
    public function logout(){
        unset($_SESSION['auth']);
        header("Location: ../Admin/login.php");
    }
}