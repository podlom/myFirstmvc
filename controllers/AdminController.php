<?php

class AdminController
{
    public function actionHome()
    {
        echo 'All title';
        return true;
    }

    public function actionView($category, $id)
    {

        echo '<br>' .$category;
        echo '<br>' .$id;
        return true;
    }
}