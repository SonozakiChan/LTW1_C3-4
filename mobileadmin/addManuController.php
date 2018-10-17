<?php
/**
 * Created by PhpStorm.
 * User: Qui
 * Date: 10/16/2018
 * Time: 8:15 PM
 */
session_start();
require_once "DB_manu.php";
$obj = new DB_manu();
$obj->add();