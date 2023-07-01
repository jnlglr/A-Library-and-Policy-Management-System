<?php
    include_once ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
    // connect to database
    include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');

    
?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../nyclibrary/css/verify_profile-style.css" />
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
    <title>Verify Sign up Email</title>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="../nyclibrary/function/function.php" method="post"> 
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
                    <h2 class="title">Verify Email</h1>
                    <h3 class="title2">Enter code sent to your email. Code expires in five (5) minutes.</h3>
                    <div class="input-field">
                        <!-- save -->
                        <input type="hidden" name="emp_id" id="emp_id" class="form-control risen shadow" required value="<?php echo $row['emp_id'];?>">
                        <i class="fas fa-lock"></i>
                        <input class="textbox" type="text" name="otp_code" placeholder="12345"><br>
                        <br style="clear: both;">
                    </div>
                    <input type="submit" class="btn-new" value="Next" name="verify_btn" style="float: right;"/>
                    <a href="../nyclibrary/sign-up_login.php">
                        <input type="button" class="btn-home" name='try again' value="Try Again">
                    </a>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <img src="images/forgot.svg" class="image" alt="" />
            </div>
        </div>
        
    </div>
    <?php
                                        }
                                    }
                                }
                                ?>
</body>
</html>
 <!-- Bootstrap core JavaScript-->
 <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/chart-area-demo.js"></script>
    <script src="../../js/demo/chart-pie-demo.js"></script>

   <!-- Page level plugins -->
   <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>

    <!-- Sweet Alert 2 -->
   <script src="../../../js/sweetalert2.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Sweet Alert 
    <script src="../../../js/sweetalert.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->

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
            timer: 1500
         });

       </script>
    <?php 
      unset($_SESSION['status']);
    
    }
   ?>

