<?php
/**
 * Created by PhpStorm.
 * User: Qui
 * Date: 10/16/2018
 * Time: 9:31 PM
 */
session_start();
require_once "DB_type.php";

$obj = new DB_type();
$obj->Type_UploadToStore($_POST['id']);