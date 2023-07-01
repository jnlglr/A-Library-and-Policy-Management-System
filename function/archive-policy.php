<?php 


// connect to database
include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
$id = $_GET['policy_id'];
$sql = "INSERT INTO `policyarchive` (policy_id, title, author, policy_status, specific_request, in_charge, date_requested, offices, date_submitted, req_position_paper, link)
         SELECT policy_id, title, author, policy_status, specific_request, in_charge, date_requested, offices, date_submitted, req_position_paper, link FROM `policy` WHERE  policy_id='$id'"; 
$sql_run = mysqli_query($db,$sql);

if($sql_run){
    $query = mysqli_query($db, "DELETE FROM `policy` WHERE policy_id = '$id'");
    if($query){
        $_SESSION['status'] = "Policy Successfully Archived!";
 		$_SESSION['status_code'] = 'success';
        header('Location: ../public/researcher/view-policies.php');
    }
}

