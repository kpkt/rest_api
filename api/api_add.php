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
 * Show result from ajax_create
 */
include_once 'inc/inc.config.php';
header("content-type:application/json");
/**
 * Get POST Value from AJAX Post
 */
if (isset($_POST['btn'])) {
    $fname = $_POST['fname'];
    $femail = $_POST['femail'];
    $fphone = $_POST['fphone'];
    $data = $restApi->api_create($fname, $femail, $fphone);
    if ($data) {
        echo json_encode($data); //show JSON Format
        exit();
    }
}
