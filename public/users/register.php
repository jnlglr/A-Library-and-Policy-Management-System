<!DOCTYPE html>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/includes/function.php');?>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title> Registration </title>
        <link rel="stylesheet" href="stylenew.css">
    </head>
    <body>
        <div class="center">
            <div class="container">
            <div class="text">Registration</div>
            <form method="post" action="register.php">
                <div class="data">
                <label>Employee ID</label>
                <input type="text" name="emp_id" required>
                <i class="fas fa-envelope"></i>
                </div>
                <div class="data">
                    <label>First Name</label>
                    <input type="text_field" name="first_name" required>
                </div>
        
       			<div class="data">
                    <label>Last Name</label>
                    <input type="text_field" name="last_name" required>
                    </div>
                
                <div class="data">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                
                <div class="data">
                    <label>Password</label>
                    <input type="password" name="password_1" required>
                </div>

                <div class="data">
                    <label>Confirm Password</label>
                    <input type="password" name="password_2" required>
                </div>
                <!--Forgot Password
                <div class="forgot-pass"><a href="#">Forgot Password?</a></div>
            	-->
                <div class="btn">
                    <div class="inner"></div>
                    <button type="submit" name="register_btn">Register</button></div>
                <div class="home-link">Back to <a href="../libraryphp/index.html">Home</a></div>
            </form>
            </div>
        </div>
    </body>
</html>