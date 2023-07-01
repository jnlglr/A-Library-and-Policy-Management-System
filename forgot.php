<?php
session_start();
$error = array();

require 'mail.php';

    // Connection to nyclibrary-db
    if(!$con = mysqli_connect('localhost', 'u174976054_dbnyclibrary', '~99?]I]$t$EPQQeF', 'u174976054_nyclibrary')){

        die("could not connect");
    }

    // . . .   
    $mode = 'enter_email';
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }

    // ENTER EMAIL, ENTER CODE, ENTER PASSWORD
    if(count($_POST) > 0){

        switch ($mode) {
        case 'enter_email':
            // code...
            $email = $_POST['email'];

            // Validate email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error[] = "Please enter a valid email";
            }else if(!valid_email($email)){
                $error[] = "Email is invalid";
            }else{

                $_SESSION['forgot']['email'] = $email;
                send_email($email);
                header("Location: forgot.php?mode=enter_code");
                die; 
            }
            break;

        case 'enter_code':
            // code...
            $code = $_POST['code'];
            $result = is_code_correct($code);
            
            if($result == "The code is correct"){

                $_SESSION['forgot']['code'] = $code;
                header("Location: forgot.php?mode=enter_password");
                die;
            }else{
                $error[] = $result;
            }
            break;

        case 'enter_password':
            // code...
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            // Validates if password matches
            if($password !== $password2){
                $error[] = "Passwords do not match";
            }elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
					header("Location: forgot.php");
					die;
            }else{
                // Saves new password
                save_password($password);
                if(isset($_SESSION['forgot'])){
                    unset($_SESSION['forgot']);
                }
                header("Location: sign-up_login.php");
                die;
            }
            break;

        default:
            //code...
            break;
        }
    }

    // Code generation once email is entered.
    function send_email($email){
        global $con; // To resolve "Undefined variable $con" error

        $expire = time() + (60 * 5);
        $code = rand(10000, 99999);

        $query = "insert into codes (email, code, expire) value ('$email', '$code', '$expire')"; 
        mysqli_query($con, $query);

        // Sends code through the user's email  
        send_mail($email, 'Password Reset', "Your code is " . $code);
    }

    // Updates Password in the database
    function save_password($password){
        global $con; // To resolve "Undefined variable $con" error
        ///// 10-01
        $password = password_hash($password, PASSWORD_DEFAULT);
        $email = addslashes($_SESSION['forgot']['email']);  

        $query = "UPDATE user SET password = '$password' WHERE email = '$email' LIMIT 1";
        mysqli_query($con, $query);
    }

    // Validates email entered
    function valid_email($email){
        global $con; // To resolve "Undefined variable $con" error

        $email = addslashes($email);

        $query = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($con, $query);
        if($result){
            if(mysqli_num_rows($result) > 0){

                return true;                         
            }
        }

        return false;
    }

    // Validates entered code if equal to generated code.
    function is_code_correct($code){
        global $con; // To resolve "Undefined variable $con" error
        $code = addslashes($code);
        $expire = time();
        $email = addslashes($_SESSION['forgot']['email']);

        $query = "SELECT * FROM codes WHERE code = '$code' && email = '$email' ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($con, $query);
        // Checks to see if query is runnable
        if($result){
            if(mysqli_num_rows($result) > 0){
                // Checks code's expiration validity
                $row = mysqli_fetch_assoc($result);
                if($row['expire'] > $expire){
                    // Code is valid 
                    return "The code is correct"; 
                                       
                }else{
                    return "The code is expired";
                }
            } else{
                return "The code is incorrect";
            } 
        }
        return "The code is invalid";
    
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../nyclibrary/css/forgotstyle.css" />
    <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"></script>
    <!-- sweet alert -->
    <script src="sweetalert2.all.min.js"></script>
    <!-- Sweet Alert 2 -->
    <script src="../../../js/sweetalert2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Prevent user going back after log-out -->
    <script type ="text/javascript">
        function preventBack(){window.history.forward()};
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
    </script>
        <title>Forgot Password</title>
    </head>
    <body>
        <div class="container">
        <?php 
        switch ($mode) {
            case 'enter_email':
                // code...
                ?>  
                    <div class="forms-container">
                        <div class="signin-signup">
                            <form method="post" action="../nyclibrary/forgot.php?mode=enter_email"> 
                            <h2 class="title">Forgot Password</h1>
                            <h3 class="title2">Enter your email below</h3>
                            <span style="font-size: 12px; color: red;">
                            <?php
                                foreach ($error as $err){
                                    echo $err . "<br>";
                                }
                            ?>
                            </span>
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input class="textbox" type="email" name="email" placeholder="Email"><br>
                            </div>
                            <br style="clear: both;">
                            <input type="submit" value="Submit" class="btn" name="next_btn">
                            <a a href="../nyclibrary/sign-up_login.php">
                                <input type="" class="btn-home-new" name='cancel' value="Cancel"/>
                            </a>
                            </form>
                        </div>
                    </div>
                <?php				
            break;

            case 'enter_code':
                // code...
                ?>
                    <div class="forms-container">
                        <div class="signin-signup">
                            <form method="post" action="../nyclibrary/forgot.php?mode=enter_code"> 
                                <h1 class="title">Verify Email</h1>
                                <h3 class="title2">Enter code sent to your email. Code expires in five (5) minutes</h3>
                                
                                <span style="font-size: 12px; color: red;">
                                <?php
                                    foreach ($error as $err){
                                        echo $err . "<br>";
                                    }
                                ?>
                                </span>
                                <div class="input-field">
                                    <i class="fas fa-lock"></i>
                                    <input class="textbox" type="text" name="code" placeholder="12345"><br>
                                </div>
                                    <br style="clear: both;">
                                <input type="submit" value="Next" class="btn" name="next_btn" style="float: right;">
                                <a href="../nyclibrary/forgot.php">
                                    <input type="button" class="btn-home" name='try again' value="Try Again">
                                </a>
                            </form>
                        </div>
                    </div>
                <?php
            break;

            case 'enter_password':
                // code...
                ?>
                    <div class="forms-container">
                        <div class="signin-signup">
                            <form method="post" action="../nyclibrary/forgot.php?mode=enter_password"> 
                                <h1 class="title">Change Password</h1>
                                <h3 class="title2">Enter your new password</h3>
                                <span style="font-size: 12px; color: red;">
                                <?php
                                    foreach ($error as $err){
                                        echo $err . "<br>";
                                    }
                                ?>
                                </span>
                                <div class="input-field">
                                    <i class="fas fa-lock"></i>
                                    <input class="textbox" type="text" name="password" placeholder="Password"><br>
                                </div>
                                <div class="input-field">
                                    <i class="fas fa-lock"></i>
                                    <input class="textbox" type="text" name="password2" placeholder="Retype Password"><br>
                                </div>
                                <br style="clear: both;">
                                <input type="submit" value="Save" class="btn" name="next_btn" style="float: right;">
                                <br><br>
                            </form>
                        </div>
                    </div>
                <?php
                break;
                
            default:
                // code...
                break;
        }

        ?>

        <div class="panels-container">
            <div class="panel left-panel">
                <img src="images/forgot.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    </body>
</html>