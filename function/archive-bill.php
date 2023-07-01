<?php 
// connect to database
include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');

$id = $_GET['senatebill_id'];

$sql = "INSERT INTO `senatearchive` (senatebill_id, emp_id, bill_number, title, date_filed, subject, sponsor, in_charge, updates, link, center_of_participation)
         SELECT * FROM `senatebill` WHERE  senatebill_id='$id'"; 
$sql_run = mysqli_query($db,$sql);

if($sql_run){
    $query = mysqli_query($db, "DELETE FROM `senatebill` WHERE senatebill_id = '$id'");
    if($query){
        $_SESSION['status'] = "Bill Successfully Archived!";
 		$_SESSION['status_code'] = 'success';
        header('Location: ../public/researcher/view-bills.php');
    }
}

