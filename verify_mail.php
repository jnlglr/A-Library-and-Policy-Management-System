<?php
    include_once ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
    // connect to database
    include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');  

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    // Gets user's email and generated code
    function send_mail($recipient, $subject, $message)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();

        $mail->SMTPDebug  = 0;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        // System's designated account
        $mail->Username   = "nyclibrary2023@gmail.com";
        $mail->Password   = "knkeosiuajwoojud";
        $mail->IsHTML(true);
        // User's email address
        $mail->AddAddress($recipient, "recipient name");
        $mail->SetFrom("nyclibrary2023@gmail.com", "NYC - YOUTH POLICY
        DEVELOPMENT SYSTEM");
        //$mail->AddReplyTo("reply-to-email", "reply-to-name");
        //$mail->AddCC("cc-recipient-email", "cc-recipient-name");
        $mail->Subject = $subject;
        $content = $message;

        $mail->MsgHTML($content); 
    
        if (!$mail->Send($content)) {   
            $_SESSION['status'] = "Oops.. Email Unverified!";
            $_SESSION['status_code'] = 'error';
            header("location: ../nyclibrary/sign-up_login.php");

            return false;   
        }
        else {
            $_SESSION['status'] = "OTP Code Sent To Your Email!";
            $_SESSION['status_code'] = 'success';
            header("location: ../nyclibrary/verify.php");

            return true;
        }

    }
?>
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

