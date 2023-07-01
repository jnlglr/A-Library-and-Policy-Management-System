<?php 


// connect to database
include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
$id = $_GET['no_cd'];
$sql = "INSERT INTO `cdarchive` (no_cd, emp_id, title)
         SELECT * FROM `cd` WHERE  no_cd='$id'"; 
$sql_run = mysqli_query($db,$sql);

if($sql_run){
    $query = mysqli_query($db, "DELETE FROM `cd` WHERE no_cd = '$id'");
    if($query){
        $_SESSION['status'] = "Document Successfully Archived!";
 		$_SESSION['status_code'] = 'success';
        header('Location: ../public/librarian/view-cd.php');
    }
}



