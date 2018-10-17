<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/16/2018
 * Time: 4:31 PM
 */

session_start();
require_once "Db.php";

$obj = new Db();

$obj->uploadToStore($_POST['id']);
