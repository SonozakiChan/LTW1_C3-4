<?php
/**
 * Created by PhpStorm.
 * User: Qui
 * Date: 10/17/2018
 * Time: 12:16 AM
 */

session_start();
require_once "../DB_admin.php";

$obj = new DB_admin();

$obj->login();