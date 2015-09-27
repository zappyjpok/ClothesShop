<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 9/09/2015
 * Time: 5:16 PM
 */

require_once('../App/Database/PDO_Connect.php');

class Product {

    public static function All()
    {
        try{
            $sql = "SELECT * FROM tblProduct";
            $db = new PDO_Connect();
            $db->query($sql);
            $errors = $db->getErrors();
            $results = $db->result_set();

        } catch(Exception $e) {
            $error = $e->getMessage();
        }

        return $results;
    }


    public static function Add($name, $image, $price, $description)
    {
        try {
            $sql = 'INSERT INTO tblProduct(proName, proImage, proPrice, proDesc)
                    VALUES (:Name, :Image, :Price, :Description)';
            $db = new PDO_Connect();
            $db->prepare($sql);
            $db->bind(':Name', $name);
            $db->bind(':Image', $image);
            $db->bind(':Price', $price);
            $db->bind(':Description', $description);
            $db->execute();
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }

    public static function find($id)
    {
        try {
            $sql = "SELECT *
                FROM tblProduct
                WHERE proProductID=:Id";
            $db = new PDO_Connect();
            $db->prepare($sql);
            $db->bind(':Id', $id, PDO::PARAM_INT);
            $results = $db->single();
            $errors = $db->getErrors();
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
        return $results;
    }

}