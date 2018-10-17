<?php
/**
 * Created by PhpStorm.
 * User: Qui
 * Date: 10/16/2018
 * Time: 9:31 PM
 */
session_start();
require_once "DB_manu.php";

$obj = new DB_manu();
$obj->Manu_UploadToStore($_POST['id']);