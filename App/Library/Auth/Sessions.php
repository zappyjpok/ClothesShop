<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 6/09/2015
 * Time: 7:19 PM
 */

/**
 * Class Sessions
 *
 * A class to help work with session
 */
class Sessions {

    private $logged_in = false;
    private $user_id;
    private $user_Fname;
    private $user_Lname;
    private $user_email;

    function __construct() {
        if(!isset($_SESSION))
        {
            session_start();
        }

        $this->check_login();

    }

    /**
     * Function that checks if a user is logged in
     */
    private function check_login()
    {
        if(isset($_SESSION['user'])) {
            $this->user_id = $_SESSION['user']['user_id'];
            $this->logged_in = true;
        } else {
            unset($this->user_id);
            $this->logged_in = false;
        }
    }

    public function is_logged_in() {
        return $this->logged_in;
    }

    public function login($user) {

        if($user)
        {
            $_SESSION['user'] = [
                'user_id' => $user['useUserId'],
                'user_FirstName' => $user['useFirstName'],
                'user_LastName' => $user['useLastName'],
                'user_Email' => $user['useEmail']
            ];
            $this->user_id = $user['useUserId'];
            $this->logged_in = true;
        }
    }

    public function logout(){
        unset($_SESSION['user']);
        unset($this->user_id);
        $this->logged_in = false;
    }

    public function getToken()
    {
        $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
        return $token;
    }
}
