<?php
/**
 * Created by PhpStorm.
 * User: junko
 * Date: 2014/04/28
 * Time: 21:34
 */
require '../bootstrap.php';
require '../MiniBlogApplication.php';

$app = new MiniBlogApplication(false);
$app->run();