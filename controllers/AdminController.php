<?php

class AdminController
{
    public function actionHome()
    {
        echo 'All title';
        return true;
    }

    public function actionView($params)
    {
        echo '<br>' . $params[0];
        echo '<br>' . $params[1];
        echo '<br>' . $params[3];
        return true;
    }
}