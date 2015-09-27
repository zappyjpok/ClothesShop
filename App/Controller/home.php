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

    public function test()
    {

        //$this->shoppingCart->removeAllItems();

        //$this->shoppingCart->removeItem(1);

        $cart = $this->sessions->get('cart');

        $messages = $this->shoppingCart->getMessages();
        $count = 0;

        $user = $this->sessions->get('user');

        $this->view('home/test', [
            'count' => $count,
            //'message' => $messages,
            'cart'  => $cart,
            'user'  => $user
        ]);
    }

    public function addToCart($id)
    {
        $this->shoppingCart->addItem($id,1);

        $link = Links::action_link('home/index');
        header('location: ' . $link);
    }

    public function show($id)
    {
        $this->model('Product');
        $product = Product::find($id);

        $this->view('home/show', [
            'product' => $product
        ]);
    }
}