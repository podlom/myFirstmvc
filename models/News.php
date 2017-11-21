<?php


class News
{


    public static function getNewsItemById($id)
    {

    }

    public static function getNewsList() {

        $host = 'localhost';
        $dbname = 'mvc_site';
        $user = 'root';
        $password = '';
        $db = new PDO("mysql:host = $host; dbname = $dbname", $user, $password);
        var_dump($db);
        $newList = array();

        $result = $db->query('SELECT id, title, data, short_content '
            . 'FROM news '
            . 'ORDER BY date DESC '
            . 'LIMIT 10');

        $i = 0;
        while ($row = $result->fetch()) {
            $newList[$i]['id'] = $row['id'];
            $newList[$i]['title'] = $row['title'];
            $newList[$i]['data'] = $row['data'];
            $newList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        return $newsList;

    }
}