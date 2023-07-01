<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
if (!isResearcher()) {
	$_SESSION['status']  = "You must Sign-in first!";
    $_SESSION['status_code']  = "error";
	header('location: ../../../nyclibrary/sign-up_login.php');
}?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/researcher/includes/header.php');?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/researcher/includes/navbar.php');?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            <!-- TopBar -->
            <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/researcher/includes/topbar.php');?>
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
                </div>                 
                <div class="mb-3">  
                    <label>First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control risen shadow" required value="<?php echo $row['first_name'];?>">
                </div>                        
                <div class="mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control risen shadow" required value="<?php echo $row['last_name'];?>">
                
                </div>
                    <div class="mb-3">
                    <label>Division </label><br>
			        <select name="division" class="btn btn-outline-secondary btn-sm" id="division" >
                    <option value="1">Administrative and Finance</option>
				    <option value="2">Social Marketing</option>
                    <option value="3">Planning, Monitoring, and Evaluation</option>
                    <option value="4">Policy Research</option>
                    <option value="5">Regional Youth Development</option>
                    </select>
                </div>
        	
               <input type="hidden" name="email" id="email" class="form-control risen shadow" required value="<?php echo $row['email'];?>">
 
                 <!------------------------------------------------------edit-email.php----------------------------------------------------------->
                 <div class="mb-3">
                    <button type="submit" class="add_admin btn btn-outline-secondary" name="researcher-edit-email">Change Registered Email</button>
                </div>
                <!------------------------------------------------------edit-password.php----------------------------------------------------------->
                <div class="mb-3">
                    <button type="submit" class="add_admin btn btn-outline-secondary" name="researcher-edit-password">Change Password</button>
                </div>
                <button type="submit" class="add_admin btn btn-primary" name="edit-researcher-profile">Update</button>
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

 
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/researcher/includes/script.php');?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/researcher/includes/footer.php');?>

    

   
