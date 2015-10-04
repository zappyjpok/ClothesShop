<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 1/09/2015
 * Time: 6:52 PM
 */

require_once('../App/Library/ShoppingCart/GetShoppingCartValues.php');



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
        $startCart = $this->shoppingCart->getTimeFromActivation();

        //if there is no update
        $updateCart = $this->shoppingCart->getTimeFromLastUpdate();
        $this->shoppingCart->removeItem(2);
        $messages = $this->shoppingCart->getMessages();

        $this->view('home/test', [
            'time1' => $startCart,
            'time2' => $updateCart,
            'messages' => $messages
        ]);
    }

    public function addToCart($id)
    {
        $this->shoppingCart->addItem($id,1);

        $link = Links::action_link('home/index');
        header('location: ' . $link);
    }

    public function addToCartForm($id)
    {
        $this->shoppingCart->addItem($id, $_POST['Quantity']);
        $link = Links::action_link('home/index');

        header('location: ' . $link);
    }

    public function show($id)
    {
        $this->model('Product');
        $product = Product::find($id);
        $quantity = $this->getQuantityArray();

        $this->view('home/show', [
            'product'   => $product,
            'quantity'  => $quantity
        ]);
    }

    public function cart()
    {
        $collect = new GetShoppingCartValues();
        $products = $collect->getProductInformation();
        $total = $collect->getTotal();
        $quantity = $this->getQuantityArray();

        $this->view('home/cart', [
            'products'  => $products,
            'total'     => $total,
            'quantity'  => $quantity
        ]);
    }

    public function update($id)
    {
        $this->shoppingCart->updateQuantity($id, $_POST['Quantity']);

        $link = Links::action_link('home/cart');

        header('location: ' . $link);
    }

    public function remove($id)
    {
        $this->shoppingCart->removeItem($id);
        $link = Links::action_link('home/cart');

        header('location: ' . $link);
    }

    public function destroy()
    {
        $this->sessions->forget();
        $link = Links::action_link('home/index');

        header('location: ' . $link);
    }

    private function getQuantityArray()
    {
        $quantity = [
           1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20
        ];

        return $quantity;
    }
}