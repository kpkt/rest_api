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
 * @name Rest
 * @description This is the main class file which contains code for api operations.
 *              so that we won't have to write the same header codes every-time. 
 */

class Rest {

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
     * @return string
     * @url http://php.net/manual/en/pdostatement.fetchall.php
     * 
     */
    public function api_get_all_data($query) {
        $stmt = $this->db->prepare($query); //SELECT <field1>, <field2> FROM <table>
        $stmt->execute();
        /* if result execute not empty */
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dataTrue = array(
                'status' => 'berjaya',
                'data' => $results
            );
            return $dataTrue;
        }
    }

    /**
     * Get Selected Data by @param
     * Function get the records from database table.
     * @param type $id
     * @return boolean|string
     * @url http://php.net/manual/en/pdostatement.fetch.php
     */
    public function api_get_data($id = null) {
        if ($id) {
            $stmt = $this->db->prepare("SELECT * FROM staffs WHERE id=:id");
            $stmt->execute(array(":id" => $id));
            /* if result execute not empty */
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $dataTrue = array(
                    'status' => 'berjaya',
                    'data' => $result
                );
                return $dataTrue;
            } else {
                $dataFalse = array(
                    'status' => 'gagal'
                );
                return $dataFalse;
            }
        } else {
            return false;
        }
    }
    
    /**
     * Get Selected Data by @param
     * Function get the records from database table.
     * @param type $param
     * @return boolean|string
     * @url http://php.net/manual/en/pdostatement.fetch.php
     */
    
    public function api_search_data($param = null) {
        if ($param) {
            $stmt = $this->db->prepare("SELECT * FROM staffs WHERE name LIKE :name");            
            $stmt->execute(array(":name" => "%$param%"));
            /* if result execute not empty */
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $dataTrue = array(
                    'status' => 'berjaya',
                    'keputusan' => $result
                );
                return $dataTrue;
            } else {
                $dataFalse = array(
                    'status' => 'gagal'
                );
                return $dataFalse;
            }
        } else {
            return false;
        }
    }

    /**
     * Save Function
     * Functions are in try/catch block to handle exceptions.
     * @param type $fname
     * @param type $femail
     * @param type $fphone
     * @return string
     * @ref http://php.net/manual/en/pdostatement.execute.php
     * @ref http://php.net/manual/en/pdostatement.bindparam.php
     */
    public function api_create($fname, $lname, $email, $address, $phone, $gender) {
        try {
            $stmt = $this->db->prepare("INSERT INTO staffs(fname,lname,email,phone,address,gender) VALUES(:fname,:lname, :email, :phone,:address,:gender)");
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":phone", $phone);
            $stmt->bindparam(":address", $address);
            $stmt->bindparam(":gender", $gender);
            $stmt->execute();
            $lastInsertId = $this->db->lastInsertId(); //Get Last ID after insert
            $dataTrue = array(
                'status' => 'berjaya',
                'data' => array('id' => $lastInsertId, 'fname' => $fname,'lname' => $lname, 'email' => $email, 'phone' => $phone, 'address' => $address, 'gender' => $gender)
            );
            return $dataTrue;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $dataFalse = array(
                'status' => 'gagal'
            );
            return $dataFalse;
        }
    }

    /**
     * Update Function
     * Functions are in try/catch block to handle exceptions. 
     * @param type $id
     * @param type $fname
     * @param type $femail
     * @param type $fphone
     * @return string
     * @ref http://php.net/manual/en/pdostatement.execute.php
     * @ref http://php.net/manual/en/pdostatement.bindparam.php
     */
    public function api_update($id, $fname, $lname, $email, $address, $phone, $gender) {
        try {
            $stmt = $this->db->prepare("UPDATE staffs SET 
                fname=:fname, 
                lname=:lname, 
                email=:email, 
                phone=:phone,
                address=:address,
                gender=:gender
             WHERE id=:id");
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":phone", $phone);
            $stmt->bindparam(":address", $address);
            $stmt->bindparam(":gender", $gender);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            $dataTrue = array(
                'status' => 'berjaya',
                'data' => array('id' => $id, 'fname' => $fname,'lname' => $lname, 'email' => $email, 'phone' => $phone, 'address' => $address, 'gender' => $gender)
            );
            return $dataTrue;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $dataFalse = array(
                'status' => 'gagal'
            );
            return $dataFalse;
        }
    }

}
