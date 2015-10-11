<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 11/10/2015
 * Time: 4:12 PM
 */

require_once('../App/Database/PDO_Connect.php');

class SubNavbar {

    protected $name;

    public static function All_Sub($id)
    {
        try{
            $sql =   "SELECT snvName
                      FROM tblSubNav
                      WHERE snvNavID = $id";
            $db = new PDO_Connect();
            $db->query($sql);
            $db->bind(':navid', (int)$id, PDO::PARAM_INT);
            $errors = $db->getErrors();
            $results = $db->result_set();

        } catch(Exception $e) {
            $error = $e->getMessage();
        }

        return $results;
    }

}