<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 1/09/2015
 * Time: 6:23 PM
 */

class Controller
{
    protected $loggedIn;
    protected $session;

    public function __construct()
    {
        $session = new Sessions();
        $this->loggedIn = $session->is_logged_in();
        $this->session = $session;

    }

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
        $loggedIn = $this->loggedIn;
        $cart = $this->getCart();

        require_once('../App/Views/' . $view . '.php');
    }

    private function getCart()
    {
        $cart = 'You have 0 items in your shopping cart';
        if(isset($_SESSION['ShoppingCart']))
        {
            $count = count($_SESSION['ShoppingCart']['Name']);
            if($count === 1)
            {
                $cart = 'You have 1 item in your cart';
            } else {
                $cart = 'You have ' . $count . ' items in your cart';
            }
        }
        return $cart;
    }
}
