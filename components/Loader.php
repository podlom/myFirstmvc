<?php


class Loader
{
    public function loadClass($class)
    {
        $arr = explode(DIRECTORY_SEPARATOR, $class);
        $prefix = array_shift($arr);

        if($prefix == 'components') {
            $prefix_file = '..'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR;
        }
        $file = $prefix_file .array_shift($arr) .'.php';

        if(is_file($file)) {
            require_once $file;
        }
    }
}
