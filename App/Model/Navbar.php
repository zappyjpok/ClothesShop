<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 11/10/2015
 * Time: 4:11 PM
 */

require_once('../App/Database/PDO_Connect.php');

class Navbar {

    protected $name;

    public static function All()
    {
        try{
            $sql = "SELECT * FROM tblNav";
            $db = new PDO_Connect();
            $db->query($sql);
            $errors = $db->getErrors();
            $results = $db->result_set();

        } catch(Exception $e) {
            $error = $e->getMessage();
        }

        return $results;
    }

}