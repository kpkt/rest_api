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
include_once '../inc/inc.config.php';
/*
 * design the content to be in JSON format
 */
header("content-type:application/json");
/*
 * Access-Control-Allow-Origin for allow request from diffrent domain
 * Exp:
 *      "Access-Control-Allow-Origin: *"
 *      "Access-Control-Allow-Origin: http://www.example.org/"
 */
header("Access-Control-Allow-Origin: *");

/*
 * Access-Control-Allow-Methods for allow request method such as GET, POST, OPTIONS
 */
header('Access-Control-Allow-Methods: GET, POST');


/**
 * Get POST Value from AJAX Post
 */
if (isset($_POST['btn'])) {
    $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
    $data = $restApi->api_create($fname, $lname, $email, $address, $phone, $gender);
    if ($data) {
        echo json_encode($data); //show JSON Format
        exit();
    }
}
