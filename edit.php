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
 * @name Edit page
 * @description this file will show form for update data
 */
?>
<?php
/*
 * the database connection
 */
include_once 'inc/inc.config.php';


/*
 * included at the beginning of all files
 */
include_once 'inc/inc.header.php';
?>

<div class="row mzm">
    <?php
    /* Get all value of POST */
    if (isset($_POST['btn-update'])) {
        $id = $_GET['edit_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

        if ($crud->update($id, $fname, $lname, $email, $address, $phone, $gender)) {
            echo '<div class="alert alert-info">The user has been updated. <a href="index.php"><strong>HOME</strong></a>!</div>';
        } else {
            echo '<div class="alert alert-warning">The user could not be saved. Please, try again. <a href="index.php"><strong>HOME</strong></a>!</div>';
        }
    }

    /* Get edit_id value */
    if (isset($_GET['edit_id']) && is_numeric($_GET['edit_id'])) {
        $id = $_GET['edit_id'];
        extract($crud->read($id));
    }
    ?>
    <h3 class="text-center"><?php echo 'Update Record' ?></h3>
    <form method='post' class="form-horizontal">
        
        
        <div class="form-group form-group-lg">
            <label for="inputFName" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $fname; ?>"> 
            </div>
        </div>  
        <div class="form-group form-group-lg">
            <label for="inputLName" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>"> 
            </div>
        </div>    
        <div class="form-group form-group-lg">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control"  name="email" placeholder="Email" value="<?php echo $email; ?>">
            </div>
        </div>
        <div class="form-group form-group-lg">
            <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="<?php echo $phone; ?>">
            </div>
        </div>
        <div class="form-group form-group-lg">
            <label for="inputAddress" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address" placeholder="Address" cols="5"  value="<?php echo $address; ?>">
            </div>
        </div>
        <div class="form-group form-group-lg">
            <label for="inputGender" class="col-sm-2 control-label">Gender</label>
            <div class="col-sm-8">
                <select class="form-control" name="gender" required>
                <option value="Lelaki" <?php echo ($gender == 'Lelaki'?'selected="selected"':'') ?>>Lelaki</option>
                <option value="Perempuan" <?php echo ($gender == 'Perempuan'?'selected="selected"':'') ?>>Perempuan</option>             
                </select>                
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success btn-lg"  name="btn-update">
                    <span class="glyphicon glyphicon-plus"></span> Update this Record
                </button>
            </div>
        </div>
    </form>

</div>

<?php
/*
 * included at the end of all files 
 */
include_once 'inc/inc.footer.php';
