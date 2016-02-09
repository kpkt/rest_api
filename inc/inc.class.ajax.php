<?php

/*
 * @tutorial Sesi "Transfer of technology"
 * Penggunaan AppGen - API Manager dan 
 * pembangunan API Service dengan mengggunakan
 * PHP dan MySQL
 * @author 	: Mohamad Zaki Mustafa
 * @contact 	: mzm@kpkt.gov.my
 * @date	: 17hb Februari 2015
 * @location 	: Makmal Komputer, Bahagian Teknologi Maklumat,
 *             	  Kementerian Kesejahteraan Bandar, Perumahan Dan Kerajaan Tempatan	
 */

/*
 * CRUD AJAX file
 * @name Crudajax
 * @description This is the main class file which contains code for database operations.
 *              so that we won't have to write the same header codes every-time. 
 *              This file contains bootstrap file links. 
 *              This codes design for ajax usage.
 *              This code will return array as json using 
 *              json_encode() http://php.net/manual/en/function.json-encode.php
 */

class Crudajax {

    private $db;

    /**
     * Construct
     * @param type $DB_con
     */
    function __construct($DB_con) {
        $this->db = $DB_con;
    }

    /**
     * Get All Data
     * Function selects the whole records from database table.
     * @param type $query
     * @return type
     * @url http://php.net/manual/en/pdostatement.fetchall.php
     * 
     */
    public function ajax_get_all($query) {
        $data = array();
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
     * @return boolean
     * @url http://php.net/manual/en/pdostatement.fetch.php
     */
    public function ajax_get_data($id = null) {
        if ($id) {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id=:id");
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
    public function ajax_create($fname, $femail, $fphone) {
        try {
            $stmt = $this->db->prepare("INSERT INTO users(name,email,phone) VALUES(:name, :email, :phone)");
            $stmt->bindparam(":name", $fname);
            $stmt->bindparam(":email", $femail);
            $stmt->bindparam(":phone", $fphone);
            $stmt->execute();

            $lastInsertId = $this->db->lastInsertId(); //Get Last ID after insert
            $dataTrue = array(
                'status' => 'berjaya',
                'data' => array('id' => $lastInsertId, 'name' => $fname, 'email' => $femail, 'phone' => $fphone)
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
     * @return boolean
     * @ref http://php.net/manual/en/pdostatement.execute.php
     * @ref http://php.net/manual/en/pdostatement.bindparam.php
     */
    public function ajax_update($id, $fname, $femail, $fphone) {
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

            $dataTrue = array(
                'status' => 'berjaya',
                'data' => array('id' => $id, 'name' => $fname, 'email' => $femail, 'phone' => $fphone)
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
