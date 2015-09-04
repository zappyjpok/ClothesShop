<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 28/07/2015
 * Time: 6:25 PM
 */

namespace App\library;


use App\Product;
use App\Sale;
use Illuminate\Support\Facades\Session;
use App\library\caculations;


class GetShoppingCartValues {

    protected $products = [];
    protected $messages = [];
    protected $prices = [];
    protected $total = 0;

    /**
     * Gets the product information in an array
     *
     * @return array
     */
    public function getProductInformation()
    {
        $this->queryDatabase();
        return $this->products;
    }

    public function getTotal()
    {
        $this->createTotal();
        return $this->total;
    }

    /**
     * Queries the database adds the values to the products array
     *
     *
     */
    private function queryDatabase()
    {
        if(!is_null(Session::get('cart')))
        {
            foreach(Session::get('cart') as $each_item)
            {
                foreach ($each_item as $key => $value)
                {
                    if(!is_null($each_item[$key]['id']))
                    {
                        $product = Product::findOrFail($each_item[$key]['id']);

                        if(!is_null($each_item[$key]['quantity']))
                        {
                            $price = $this->getPrice($product->id, $each_item[$key]['quantity'], $product->price);
                            $this->prices [] = $price;
                            $this->products [] =  [
                                'id'            => $each_item[$key]['id'],
                                'quantity'      => $each_item[$key]['quantity'],
                                'title'         => $product->title,
                                'author'        => $product->author,
                                'description'   => $product->description,
                                'image'         => $product->image,
                                'price'         => $price
                            ];
                        }
                    }
                }
            }
        }
    }

    /**
     * Calculates price to include sales and quantity
     *
     * @param $id
     * @param $quantity
     * @param $price
     * @return int|string
     */
    private function getPrice($id, $quantity, $price)
    {
        if(Sale::current()->findProduct($id)->first())
        {
            $price = caculations::caculateDiscountPrice($price, Sale::current()->where('product_id', $id)->first()->discount);
        }

        $price = caculations::calculatePrice($price, $quantity);

        return $price;
    }

    public function createTotal()
    {
        foreach ($this->prices as $price)
        {

            $this->total = $this->total + $price;

        }
    }


    /**
     * This returns an array that is used for testing purposes
     *
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }
}