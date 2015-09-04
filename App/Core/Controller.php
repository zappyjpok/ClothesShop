<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 1/09/2015
 * Time: 6:23 PM
 */

class Controller
{
    public function model($model)
    {
        $path = '../App/Model/' . $model . '.php';
        if(file_exists($path))
        {
            require_once($path);
            return new $model();
        } else {
            echo 'Error: This model does not exist';
        }
    }
    public function view($view, $data = [])
    {
        require_once('../App/Views/' . $view . '.php');
    }
}
