<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 6/09/2015
 * Time: 1:01 PM
 */

class Links {

    public static function action_link($name)
    {
        $name = ($name[0] === '/') ? $name : '/' . $name;
        $url = filter_var(rtrim($name, '/'), FILTER_SANITIZE_URL);
        if($_SERVER['SERVER_NAME'] === 'localhost')
        {
            $url = '/shoppingcart/Public/' . $name;
        } else {
            $url = $name;
        }
        return $url;
    }
}