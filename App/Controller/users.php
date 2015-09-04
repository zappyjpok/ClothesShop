<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 1/09/2015
 * Time: 7:42 PM
 */

class users extends Controller {

    public function index()
    {
        $user = $this->model('User');
        $users = User::All();

        $this->view('user/index',
            ['users' => $users]);
    }

    public function create()
    {
        $this->view('user/create');
    }

    public function store()
    {
        $this->model('User');
        $password = crypt($_POST['Password']);
        User::Add($_POST['FirstName'], $_POST['LastName'], $_POST['Email'], $password);
        $users = User::All();
        $this->view('user/index',
            ['users' => $users]);
    }

    public function login()
    {
        $this->view('user/login');
    }

    public function check()
    {
        $this->view('user/login');
    }
}