<?php
/**
 * Created by PhpStorm.
 * User: Qui
 * Date: 10/16/2018
 * Time: 8:15 PM
 */
session_start();
require_once "DB_type.php";
$obj = new DB_type();
$obj->add();