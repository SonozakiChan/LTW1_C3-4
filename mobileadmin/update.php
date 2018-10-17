<?php
/**
 * Created by PhpStorm.
 * User: NoNickName
 * Date: 15/10/2018
 * Time: 6:35 PM
 */
require_once "config.php";
require_once "Db.php";

$objDB = new Db();

$objDB->store();