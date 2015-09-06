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
            [
                'users' => $users
            ]);
    }

    public function create()
    {
        $this->view('user/create');
    }

    public function store()
    {
        $this->model('User');
        User::Add($_POST['FirstName'], $_POST['LastName'], $_POST['Email'], $_POST['Password']);
        $users = User::All();

        $this->view('user/index',
            [
                'users' => $users,
            ]);
    }

    public function login()
    {
        $this->view('user/login');
    }

    public function check()
    {
        $this->model('User');
        $match = User::login_check($_POST['Email'], $_POST['Password']);

        if($match)
        {
            echo "Your password matches";
        } else {
            echo "Your password doesn't match";
        }
    }

    private function attempt_login($email, $password)
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $found_user = attempt_login($email, $password);
        if ($found_user) {
            $this->view('home');
        } else {
            //Failure
            $_SESSION["message"] = "Your username or password does not match our records";
        }

        return false;
    }
}