<?php
/**
 * Created by PhpStorm.
 * User: junko
 * Date: 2014/04/28
 * Time: 21:10
 */
require 'core/ClassLoader.php';
$loader = new ClassLoader();
$loader->registerDir(dirname(__FILE__) . '/core');
$loader->registerDir(dirname(__FILE__) . '/models');
$loader->register();