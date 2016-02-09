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
 * Show result from ajax_get_data_user with param $id
 */
include_once '../inc/inc.config.php';
/*
 * design the content to be in JSON format
 */
header("content-type:application/json");

/*
 * Access-Control-Allow-Methods for allow request method such as GET, POST, OPTIONS
 */
header('Access-Control-Allow-Methods: GET, POST');

if (isset($_POST['user_id'])) {
    $id = $_POST['user_id'];
    $data = $crudajax->ajax_get_data($id);
    if ($data) {
        echo json_encode($data);//show JSON Format
        exit();
    }
}


