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
        $this->model('Product');

        $products = Product::All();

        $this->view('home/index', [
            'products'  =>  $products
        ]);
    }

    public function addToCart($id)
    {
        echo $id;
    }
}