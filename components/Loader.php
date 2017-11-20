<?php


class Loader
{
    public function loadClass($class)
    {
        $arr = explode('/', $class);
        $prefix = array_shift($arr);

        if($prefix == 'components') {
            $prefix_file = '/components';
        }
        $file = $prefix_file .array_shift($arr) .'.php';

        if(is_file($file)) {
            require_once $file;
        }
    }
}