<?php

class DbConnect
{
    public static function getConnection() {
        $params = require_once  '../config/db_params.php';
        $dsn = "mysql: host = {$params['host']}: db_name = {$params['db_name']}";
        $db = new PDO($dsn, $params['user'], $params['db_name']);
        $db->exec("set names utf8");
        return $db;
    }
}