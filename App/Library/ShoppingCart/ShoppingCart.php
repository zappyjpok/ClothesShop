<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 25/07/2015
 * Time: 2:59 PM
 */

require_once('../App/Library/Paths/Links.php');


class ShoppingCart {

    // Messages used to test the class functions
    protected $message = [];
    protected $item;
    protected $quantity;
    protected $testsResult = false;
    protected $isNull = true;
    protected $isNumeric = false;
    protected $isInt = false;
    protected $tempData = [];
    protected $sessions;

    protected $testArray = []; // delete later

    public function __construct()
    {
        $this->sessions = new SecureSessionHandler('shopping');
    }

    public function removeAllItems()
    {
        $this->sessions->destroy('cart');
    }

    public function removeItem($id)
    {
        $this->item = $id;
        $this->deleteSession();
    }

    public function updateQuantity($id, $quantity)
    {
        $this->item = $id;
        $this->quantity = $quantity;
        $this->deleteSession();
        $this->runTests();
        if($this->testsResult === true)
        {
            $this->addToSession();
        }
    }

    public function numberOfItems()
    {


        return count($this->sessions->get('cart'));
    }

    public function addItem($item, $quantity)
    {
        $this->item = $item;
        $this->quantity = $quantity;
        // Run Tests to make sure the input is valid
        $this->runTests();
        if($this->testsResult === true)
        {
            $this->addToSession();
        }

    }

    private function runTests()
    {
        $this->checkIfNull();
        if($this->isNull === false) { $this->checkIfNumbers(); }
        if($this->isNumeric === true) {
            $this->convertToInt();
            $this->testsResult = true;
        }

    }

    private function checkIfNull()
    {
        $array = [$this->item, $this->quantity];
        foreach($array as $value) {
            if (is_null($value)) {
                $this->message [] = "Failure: one was null";
                $this->isNull = true;
                break;
            } else {
                $this->message [] = "Success: they both are not null";
                $this->isNull = false;
            }
        }
    }

    private function checkIfNumbers()
    {
        $array = [$this->item, $this->quantity];
        foreach($array as $value) {
            if (!is_numeric($value)) {
                $this->message [] = "Failure: one was not numeric";
                $this->isNumeric = false;
                break;
            } else {
                $this->message [] = "Success: they are numeric";
                $this->isNumeric = true;
            }
        }
    }

    private function convertToInt()
    {
        if(!is_int($this->item))
        {
            $this->message [] = 'The item was not an int, but it has been converted';
            $this->item = (int)$this->item;
        }
        if(!is_int($this->quantity))
        {
            $this->message [] = 'The quantity was not an int, but it has been converted';
            $this->quantity = (int)$this->quantity;
        }
        $this->isInt = true;
    }

    private function addToSession()
    {
        if($this->checkIfEmpty() === false)
        {
            $count = count($this->sessions->get('cart')) + 1;
            if($this->checkIfInArray())
            {
                // Find the new quantity
                $total = $this->getNewTotal();
                // update the session using a sessions class
                $this->deleteSession();
                $this->sessions->push('cart', ['item' => $count, ['id' => $this->item, 'quantity' => $total]]);
            } else {
                $this->message [] = "There are $count items in the array session";
                $this->sessions->push('cart', ['item' => $count, ['id' => $this->item, 'quantity' => $this->quantity]]);
            }
        } else {
            $this->sessions->push('cart', ['item' => 1, ['id' => $this->item, 'quantity' => $this->quantity]]);
        }
    }

    private function checkIfEmpty()
    {
        $array = $this->sessions->get('cart');
        if(!isset($array))
        {
            $this->message [] = 'The cart is empty';
            return true;
        } else {

            $this->message [] = 'The cart is not empty';
            return false;
        }
    }

    private function checkIfInArray()
    {
        $check = false;
        if(!$this->checkIfEmpty())
        {
            foreach($this->sessions->get('cart') as $each_item)
            {
                foreach($each_item as $each_value)
                {

                    if($each_value['id'] == $this->item)
                    {
                        $this->message [] = 'Neutral: The value was in the array';
                        $check = true;
                    }
                }
            }
        }
        return $check;
    }

    private function getNewTotal()
    {
        $total = 0;
        foreach($this->sessions->get('cart') as $each_item) {
            foreach ($each_item as $each_value) {
                if ($each_value['id'] == $this->item) {
                    $firstQuantity = $each_value['quantity'];
                    $secondQuantity = $this->quantity;
                    $total = $firstQuantity + $secondQuantity;
                }
            }
        }
        $this->message [] = "The new total is $total";
        return $total;
    }

    private function deleteSession()
    {
        $this->tempData = $this->sessions->get('cart');

        $i = 0;
        foreach($this->tempData as $each_item)
        {
            $i++;
            foreach($each_item as $key => $value)
            {
                if($each_item[$key]['id'] == $this->item)
                {
                    unset($this->tempData[$i -1]);
                }
            }
        }
        $this->rebuildSession();
    }

    private function rebuildSession()
    {
        $this->removeAllItems();

        $i = 1;
        foreach($this->tempData as $each_item)
        {
            $i++;
            foreach($each_item as $key => $value)
            {
                $id = $each_item[$key]['id'];
                $quantity = $each_item[$key]['quantity'];
                if(!empty($id) && !empty($quantity)){
                    $this->message [] = "The id is $id and the quantity is $quantity";
                    $this->sessions->push('cart', ['item' => $i, ['id' => $id, 'quantity' => $quantity]]);
                }

            }
        }
    }

    public function getMessages()
    {
        if(!empty($this->message))
        {
            return $this->message;
        } else {
            return 'success';
        }
    }
}