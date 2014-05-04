<?php
/**
 * Created by PhpStorm.
 * User: junko
 * Date: 2014/04/29
 * Time: 22:38
 */

class MiniBlogApplication extends Application
{
    protected $login_action = array('account', 'signin');

    public function getRootDir()
    {
        return dirname(__FILE__);
    }

    public function registerRoutes()
    {
        return array(
            '/' => array('controller' => 'status', 'action' => 'index'),
            '/status/post' => array('controller' => 'status', 'action' => 'post'),
            '/user/:user_name' => array('controller' => 'status', 'action' => 'user'),
            '/user/:user_name/status/:id' => array('controller' => 'status', 'action' => 'show'),
            '/account' => array('controller' => 'account', 'action' => 'index'),
            '/account/:action' => array('controller' => 'account'),
            '/follow' => array('controller' => 'account', 'action' => 'follow'),
        );
    }
    protected function configure()
    {
        $this->db_manager->connect('master', array(
            'dsn' => 'mysql:dbname=mini_blog;host=localhost',
            'user' => 'root',
            'password' => 'VBI8PLUJ',
        ));
    }
}