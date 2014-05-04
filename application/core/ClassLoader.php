<?php
/**
 * Created by PhpStorm.
 * User: junko
 * Date: 2014/04/28
 * Time: 21:06
 */

class ClassLoader
{
    protected $dirs;
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }
    public function registerDir($dir)
    {
        $this->dirs[] = $dir;
    }
    public function loadClass($class)
    {
        foreach($this->dirs as $dir)
        {
            $file = $dir . '/' . $class . '.php';
            if(is_readable($file))
            {
                require $file;
                break;
            }
        }
    }
} 