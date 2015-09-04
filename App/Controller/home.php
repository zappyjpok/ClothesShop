<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 1/09/2015
 * Time: 6:52 PM
 */

class home extends Controller
{
    public function index()
    {
        $message = 'This is a value passed from the controller';
        $this->view('home/index', ['message' => $message]);
    }
}