<?php
/*
 * PHP PDO CRUD Tutorial 
 * In this tutorial we will see that how to create database 
 * CRUD operations using Object Oriented concept in PDO
 * @author 	: Mohamad Zaki Mustafa
 * @contact 	: mzm@kpkt.gov.my
 * @date	: 17hb Februari 2015
 * @location 	: Makmal Komputer, Bahagian Teknologi Maklumat,
 *             	  Kementerian Kesejahteraan Bandar, Perumahan Dan Kerajaan Tempatan	
 */

/*
 * Design Form for insert to use it into modal
 */
?>
<h3 class="text-center"><?php echo 'New Record' ?></h3>
<form class="form-horizontal">
    <div class="form-group form-group-lg">
        <label for="inputName" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="fname" placeholder="Full Name" required> 
        </div>
    </div>    
    <div class="form-group form-group-lg">
        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-8">
            <input type="text" class="form-control"  id="femail" placeholder="Email" required>
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
        <div class="col-sm-8">
            <input type="tel" class="form-control" id="fphone" placeholder="Phone Number" required>
        </div>
    </div>    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <!--data-dismiss="modal"-->
            <button type="button" class="btn btn-success btn-lg" data-dismiss="modal" value="btn-save" id="btn-save">
                <span class="glyphicon glyphicon-plus"></span> Create New Record
            </button>
            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">
                <span class="glyphicon glyphicon-remove"></span> Cancel
            </button>
        </div>
    </div>
</form>