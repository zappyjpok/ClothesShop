<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 6/09/2015
 * Time: 3:48 PM
 */

class Login {

    private $loggedIn = false;
    private $userId;
    private $message = [];

    function __construct()
    {
        session_start();

        if($this->logged_in) {
            // actions to take right away if user is logged in
        } else {
            // actions to take right away if user is not logged in
        }
    }

}