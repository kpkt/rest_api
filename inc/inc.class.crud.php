<?php

/*
 * PHP PDO CRUD Tutorial 
 * In this tutorial we will see that how to create database 
 * CRUD operations using Object Oriented concept in PDO
 * @author 	: Mohamad Zaki Mustafa
 * @contact 	: mohdzaki04@gmail.com
 * @fb	 	: https://www.facebook.com/zakimedia
 * @tw	 	: https://twitter.com/mzmfizaki
 */

/*
 * CRUD file
 * @name CRUD
 * @description This is the main class file which contains code for database operations.
 *              so that we won't have to write the same header codes every-time. 
 *              This file contains bootstrap file links. 
 */

class Crud {

    private $db;

    /**
     * Construct
     * @param type $dbCon
     */
    function __construct($dbCon) {
        $this->db = $dbCon;
    }

    /**
     * Get All Data
     * Function selects the whole records from database table.
     * @param type $query
     * @return type
     * @url http://php.net/manual/en/pdostatement.fetchall.php
     * 
     */
    public function get_all_data($query) {
        $stmt = $this->db->prepare($query); //SELECT <field1>, <field2> FROM <table>
        $stmt->execute();
        /* if result execute not empty */
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }

    /**
     * Save Function
     * Functions are in try/catch block to handle exceptions.
     * @param type $fname
     * @param type $femail
     * @param type $fphone
     * @return boolean
     * @ref http://php.net/manual/en/pdostatement.execute.php
     * @ref http://php.net/manual/en/pdostatement.bindparam.php
     */
    public function create($fname, $femail, $fphone) {
        try {
            $stmt = $this->db->prepare("INSERT INTO users(name,email,phone) VALUES(:name, :email, :phone)");
            $stmt->bindparam(":name", $fname);
            $stmt->bindparam(":email", $femail);
            $stmt->bindparam(":phone", $fphone);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Get Selected Data by @param
     * Function get the records from database table.
     * @param type $id
     * @return boolean
     * @url http://php.net/manual/en/pdostatement.fetch.php
     */
    public function read($id = null) {
        if ($id) {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id=:id");
            $stmt->execute(array(":id" => $id));
            /* if result execute not empty */
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return FALSE;
            }
        } else {
            
        }
    }

    /**
     * Update Function
     * Functions are in try/catch block to handle exceptions. 
     * @param type $id
     * @param type $fname
     * @param type $femail
     * @param type $fphone
     * @return boolean
     * @ref http://php.net/manual/en/pdostatement.execute.php
     * @ref http://php.net/manual/en/pdostatement.bindparam.php
     */
    public function update($id, $fname, $femail, $fphone) {
        try {
            $stmt = $this->db->prepare("UPDATE users SET 
                name=:name, 
                email=:email, 
                phone=:phone
             WHERE id=:id");
            $stmt->bindparam(":name", $fname);
            $stmt->bindparam(":email", $femail);
            $stmt->bindparam(":phone", $fphone);
            $stmt->bindparam(":id", $id);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Delete user data
     * @param type $id
     * @return boolean
     */
    public function delete($id) {
        if ($id) {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        }
    }


    /**
    * Looping data untuk guna satu persatu
    * setiap satu update update_by_day
    */
    public function select_all(){
        //Call function get_all_data
        $query = "SELECT * FROM users";
        $results = $this->get_all_data($query);
        foreach ($results as $data) {
         //Call function update_by_day
            $this->update_by_day($data['id'], $data['created']);
        }
    }


    /**
    * Update every data based on select_all looping
    */
    public function update_by_day($id, $created){            
        try {
            //Call function datetime_diff
            $dayInt = $this->datetime_diff($created);
            //var_dump($dayInt);
            $stmt = $this->db->prepare("UPDATE users SET day=:day WHERE id=:id");
            $stmt->bindparam(":day", $dayInt); 
            $stmt->bindparam(":id", $id);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    /**
    * Convert date and define diff date
    * http://php.net/manual/en/function.date-diff.php
    */
    private function datetime_diff($created){
        $dateCreated= date_create(date("Y-m-d", strtotime($created)));
        $dateNow=date_create(date("Y-m-d"));
        $diff =  date_diff($dateCreated,$dateNow);                 
        return $diff->format("%d");
    }

}
