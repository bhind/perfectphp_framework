<?php
/**
 * Created by PhpStorm.
 * User: bhind
 * Date: 2014/04/29
 * Time: 22:42
 */
require '../bootstrap.php';
require '../MiniBlogApplication.php';

$app = new MiniBlogApplication(true);
$app->run();