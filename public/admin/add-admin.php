<?php 
    include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
    if (!isAdmin()) {
        $_SESSION['status']  = "You must Sign-in first!";
        $_SESSION['status_code']  = "error";
        header('location: ../../../nyclibrary/sign-up_login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header('location: ../nyclibrary/sign-up_login.php');
    }
    ?>

    <?php include ('includes/header.php');?>
    <?php include ('includes/navbar.php');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
                
            <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/topbar.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12 pop shadow" >
                            <div class="card">
                                <div class="card-header">
                                    <h4>This section allows you to add another admin</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="../../../nyclibrary/public/admin/add-admin.php">

                                    <div class="mb-3">
                                        <label>Employee ID</label>
                                        <input type="text_field" name="emp_id" class="form-control risen shadow" required>
                                    </div>
                                    <div class="mb-3">  
                                        <label>First Name</label>
                                        <input type="text_field" name="first_name" class="form-control risen shadow" required>
                                    </div>   
                                    <div class="mb-3">
                                        <label>Last Name</label>
                                        <input type="text_field" name="last_name" class="form-control risen shadow" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Division </label><br>
                                        <select name="division" class="btn btn-outline-info btn-sm" id="division" >
                                            <option value="1">Administrative and Finance</option>
                                            <option value="2">Social Marketing</option>
                                            <option value="3">Planning, Monitoring, and Evaluation</option>
                                            <option value="4">Policy Research</option>
                                            <option value="5">Regional Youth Development</option>
                                            <option value="6">Commission Proper</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>User type </label><br>
                                        <select name="type" class="btn btn-outline-info btn-sm" id="type" >
                                            <option value="2">Admin</option>
                                            <option value="3">Librarian</option>
                                            <option value="4">Researcher</option>
                                        </select>
                                    </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control risen shadow" required>
                                </div>
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password_1" class="form-control risen shadow" id="myInput" required>
                                    <input type="checkbox" onclick="myFunction()">Show Password
                                </div>
                                
                                <div class="mb-3">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_2" class="form-control risen shadow" id="myInput1" required>
                                    <input type="checkbox" onclick="myFunction1()">Show Password
                                </div>
                                
                                <div style="text-align: center;"><div style="text-align: center;">
                    <span style="color:grey">Password must be a minimum of 8 characters and contains numbers and special characters.
                </span>
                            </div>
                            <br>
                                <button type="submit" class="add_admin btn btn-primary" name="register_admin_btn"> Create Admin</button>
                                </div>
                                
                        </div>
                    </div>
                </div>
        </div>           
    </div>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction1() {
  var x = document.getElementById("myInput1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    <?php include ('includes/script.php');?>