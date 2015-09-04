<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 30/08/2015
 * Time: 5:32 PM
 */


require_once('../App/Database/PDO_Connect.php');

class User {

    public $FirstName;
    public $LastName;
    public $Email;
    public $Id;

    public static function All()
    {
        try{
            $sql = "SELECT useUserId, useFirstName, useLastName, useEmail FROM tblUser";
            $db = new PDO_Connect();
            $db->query($sql);
            $errors = $db->getErrors();
            $results = $db->result_set();

        } catch(Exception $e) {
            $error = $e->getMessage();
        }

        return $results;
    }

    public static function Add($firstName, $lastName, $email, $password)
    {
        $pass = crypt($password);
        $sql = 'INSERT INTO tblUser(useFirstName, useLastName, useEmail, usePassword)
                VALUES (:FirstName, :LastName, :Email, :Password)';
        $db = new PDO_Connect();
        $db->prepare($sql);
        $db->bind(':FirstName', $firstName);
        $db->bind(':LastName', $lastName);
        $db->bind(':Email', $email);
        $db->bind(':Password', $pass);
        $db->execute();
    }

}