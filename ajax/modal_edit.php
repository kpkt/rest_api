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
 * Design Form for edit to use it into modal
 */
?>
<h3 class="text-center"><?php echo 'Update Record' ?></h3>
<form class="form-horizontal">
    <input type="hidden" class="form-control" id="user_id"> 
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
            <button type="button" class="btn btn-success btn-lg" data-dismiss="modal" value="btn-update" id="btn-update">
                <span class="glyphicon glyphicon-plus"></span> Update this Record
            </button>
            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">
                <span class="glyphicon glyphicon-remove"></span> Cancel
            </button>
        </div>
    </div>
</form>