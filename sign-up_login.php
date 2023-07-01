<?php include ('./function/function.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"></script>
     <!-- sweet alert -->
     <script src="sweetalert2.all.min.js"></script>
     <!-- Sweet Alert 2 -->
   <script src="../../../js/sweetalert2.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../nyclibrary/css/sign-up-login-style.css" />
    <!-- Prevent user going back after log-out -->
    <script type ="text/javascript">
      function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0);
        window.onunload=function(){null;}
    </script>
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <!--SIGN-IN FORM-->
          <form method="post" action="../nyclibrary/sign-up_login.php" class="sign-in-form">
            <h2 class="title">Sign in</h2>
           
            <!--EMPLOYEE ID-->
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Employee ID" id="emp_id" name="emp_id" required/>
            </div>
            <!--PASSWORD-->
            <div class="input-field">
              <i class="fas fa-eye" id="togglePassword"></i>
              <input type="password" placeholder="Password" id="password"  name="password" required/>
            </div>
            <div style="text-align: center;">
                  <span style="color:grey">(Click the eye icon to make the password visible.)</span>
                </div>
            <!--LOGIN BUTTON-->
            <input type="submit" value="Login" class="btn" name="login_btn"/>

            <?php
            if(isset($_GET['newpwd'])){
              if($_GET['newpwd'] == "passwordupdated"){
                echo'<p class="signupsuccess">Your password has been reset!</p>';
              }
            }
            ?>
            <!-- FORGET PASSWORD -->
             <a href="../nyclibrary/forgot.php" class="float-end">Forgot Password?</a>
            <!--HOME BUTTON-->
            <a href="../nyclibrary/index.html">
              <input type="" class="btn-home" name='home' value="Back to Home"/>
            </a>
          </form>
          <!--SIGN UP FORM-->
          <form method="post" action="../nyclibrary/sign-up_login.php" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            
            <!--EMPLOYEE ID-->
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Employee ID" name="emp_id" required/>
            </div>
            <!--FIRSTNAME-->
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="First Name" name="first_name" required/>
            </div>
            <!--LASTNAME-->
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Last Name" name="last_name" required/>
            </div>
            <!--EMAIL-->
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" required/>
            </div>
            <!--DIVISION-->
            <div class="input-field">
              <i class="fas fa-user"></i>
              <select name="division" id="division">
                <option value="None" selected disabled hidden>Division</option>
                <option value="1">Administrative and Finance</option>
                <option value="2">Social Marketing</option>
                <option value="3">Planning, Monitoring, and Evaluation</option>
                <option value="4">Policy Research</option>
                <option value="5">Regional Youth Development</option>
                <option value="6">Commission Proper</option>
              </select>	
            </div>
            <input type="hidden" name="type" value="1">
            <!--PASSWORD-->
            <div class="input-field">
            <i class="fas fa-eye" id="togglePassword1"></i>
              <input type="password" placeholder="Password" name="password_1" id="password_1" required/>
            </div>
            <!--CONFIRM PASSWORD-->
            <div class="input-field">
            <i class="fas fa-eye" id="togglePassword2"></i>
                <input type="password" placeholder="Confirm Password" name="password_2" id="password_2" required/>
                
              </div>
            
            <div class="divCheckPassword" style="text-align: center;">
              <!--<span id="divCheckPasswordMatch" style="color:red"></span>-->
              <!--<span id="divCheckPasswordMatch1" style="color:green"></span>-->
             
              <div style="text-align: center;">
                  <span style="color:grey">(Click the eye icon to make the password visible.)</span>
                  <br>
            <span style="color:grey">Password must be a minimum of 8 characters and should contain numbers and special characters.</span>
                </div>
            </div>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const togglePassword1 = document.querySelector('#togglePassword1');
    const togglePassword2 = document.querySelector('#togglePassword2');
  const password = document.querySelector('#password');
  const password1 = document.querySelector('#password_1');
  const password2 = document.querySelector('#password_2');
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
togglePassword1.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
    password1.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
togglePassword2.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
    password2.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
  </script>
            <script>
          function checkPasswordMatch() {
        var password = $("#password_1").val();
          var confirmPassword = $("#password_2").val();
          // if (strlen(password) < 8)
          //     $("#divCheckPasswordMatch").html("Password must be more than 8 characters!");
          if (password != confirmPassword)
              $("#divCheckPasswordMatch").html("Passwords do not match.");
          else
              $("#divCheckPasswordMatch").html("");
           }

           function checkPasswordMatch1() {
        var password = $("#password_1").val();
          var confirmPassword = $("#password_2").val();
          // if (strlen(password) < 8)
          //     $("#divCheckPasswordMatch").html("Password must be more than 8 characters!");
          if (password != confirmPassword)
              $("#divCheckPasswordMatch1").html("");
          else
              $("#divCheckPasswordMatch1").html("Passwords match.");
           }

           function checkPasswordLength() {
          var password1 = $("#password_1").val();
          if (password1.length < 8)
            $("#divCheckPasswordLength").html("Password must be more than 8 characters!");
          if (password1.length > 8)
              $("#divCheckPasswordLength").html("");
           }

           function checkPasswordNum() {
          var password1 = document.getElementById("password_1");
          var regex= /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/
          if (password1.value.match(regex))
            $("#divCheckPasswordNum").html("Password is strong.");
          if (!password1.value.match(regex))
            $("#divCheckPasswordNum").html("Password is weak.");
           }
           
        
          $(document).ready(function () {
           $("#password_2").keyup(checkPasswordMatch);
          });

          $(document).ready(function () {
           $("#password_2").keyup(checkPasswordMatch1);
          });

          $(document).ready(function () {
           $("#password_1").keyup(checkPasswordLength);
          });

          $(document).ready(function () {
           $("#password_1").keyup(checkPasswordNum);
          });

        

          </script>
            <!--SUBMIT BUTTON-->
            <input type="submit" class="btn-new" value="Sign up" name="register_btn"/>
            <!--HOME BUTTON-->
            <a href="../nyclibrary/index.html">
              <input type="" class="btn-home" name='home' value="Back to Home"/>
            </a>
          </form>
        </div>
      </div>
      
      <!--Sign-up Panel-->
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New to the website ?</h3>
            <p>
              Sign up now!
            </p>
            <!--Sign-up Panel Button-->
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="images/sign-in.svg" class="image" alt="" />
        </div>
        <!--Sign-in Panel-->
        <div class="panel right-panel">
          <div class="content">
            <h3>Already a member ?</h3>
            <p>
              It's great that you're back!
            </p>
            <!--Sign-in Panel Button-->
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="images/signup.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="../nyclibrary/js/app.js"></script>
    
      
    <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
      ?>
       <script>
         Swal.fire({
            position: 'top-end',
            // text: "You clicked the button!",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            title: "<?php echo $_SESSION['status']; ?>",
            showConfirmButton: false,
            timer: 3000
         });

       </script>
    <?php 
      unset($_SESSION['status']);
    
    }
   ?>

  </body>
</html>