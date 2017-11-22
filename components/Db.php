<?php

class Db
{
    public static function getConnection() {
        $paramsPath = ROOT .'../config/db_params.php';
        $params = include($paramsPath);
        $dsn = "mysql: host = {$params['host']}: db_name = {$params['db_name']}";
        $db = new PDO($dsn, $params['user'], $params['db_name']);
        $db->exec("set names utf8");
        return $db;
    }
}

