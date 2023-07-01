<?php 


// connect to database
include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
$date_time = date_create('Asia/Manila')->format('Y-m-d H:i:s');
$emp_id = $_GET['emp_id'];
$title = $_GET['title'];
$id = $_GET['no_cd'];
$sql = "INSERT INTO `cdarchive` (no_cd, emp_id, title)
         SELECT * FROM `cd` WHERE  no_cd='$id'"; 
$sql_run = mysqli_query($db,$sql);

if($sql_run){
    $query = mysqli_query($db, "DELETE FROM `cd` WHERE no_cd = '$id'");
    if($query){
        //audit log saving
					$action_made = "An employee logged in.";
					$sql = "INSERT INTO `audittrail` (date_time, emp_id, action_made) VALUES ('$date_time', '$emp_id','$action_made')";
					$save = mysqli_query($db, $sql);
        $_SESSION['status'] = "Document Successfully Archived!";
 		$_SESSION['status_code'] = 'success';
        header('Location: ../public/admin/view-cd.php');
    }
}



