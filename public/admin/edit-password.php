<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
if (!isAdmin()) {
	$_SESSION['status']  = "You must Sign-in first!";
    $_SESSION['status_code']  = "error";
	header('location: ../../../nyclibrary/sign-up_login.php');
}?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/header.php');?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/navbar.php');?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            <!-- TopBar -->
            <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/topbar.php');?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                    </div>

                       
                    <div class="row">
                        <div class="col-md-12 pop shadow" >
                            <div class="card">
                                <div class="card-header">
                                    <h4>This section allows you to edit your profile
                                    
                                    </h4>
                                </div>
                                <div class="card-body">
                                <form action="../../../nyclibrary/function/function.php"  method="post">

                            <?php
                                include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                                $currentUser = $_SESSION['user']['emp_id'];
                                $query = "SELECT * FROM `user` WHERE emp_id = '$currentUser'";

                                $result = mysqli_query($db, $query);

                                if($result){
                                    if(mysqli_num_rows($result)>0){
                                        while($row = mysqli_fetch_array($result)){
                                            // print_r($row);
                                
                                        ?>
                            
                            
                                        <!-- Content Row -->
                        
                    <div class="mb-3">  
                    <!-- save -->
                    <input type="hidden" name="emp_id" id="emp_id" class="form-control risen shadow" required value="<?php echo $row['emp_id'];?>">
       
                <!------------------------------------------------------EDIT PASSWORD----------------------------------------------------------->  
                <div class="mb-3">
                    <label>Current Password</label>
                    <input type="password" name="current_password" class="form-control risen shadow" required value="">
                </div>
                <div class="mb-3">
                    <label>Create New Password</label>
                    <input type="password" name="password_1" class="form-control risen shadow" required value="">
                </div>
                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="password_2" class="form-control risen shadow" required value="">
                </div>  
                <div style="text-align: center;">
                    <span style="color:grey">Password must contain uppercase and lowercase letters, symbols, and numbers.
                </span>
                </div>
              <br>
              <div style="text-align: center;">
                <button type="submit" class="add_admin btn btn-primary" name="edit-admin-pass">Update</button>
                </div>
            
                <!------------------------------------------------------EDIT PASSWORD-----------------------------------------------------------> 
            </form>

                                </div>
                            </div>
                        </div>

                                        <?php
                                        }
                                    }
                                }
                            ?>
                    

                    <!-- Content Row -->
                   
                    </div>
                           
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

 
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/script.php');?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/footer.php');?>

    

   
