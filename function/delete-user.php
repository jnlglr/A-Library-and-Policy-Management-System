<?php 


// connect to database
include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
$id = $_GET['emp_id'];
$sql = "DELETE FROM `user` WHERE emp_id='$id'"; 
$sql_run = mysqli_query($db, $sql);

if($sql_run){
        echo '<script>alert("User Succesfully Deleted!")</script>';
        header('Location: ../public/admin/view-users.php');
    
}
