<?php 


// connect to database
include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
$id = $_GET['thesis_no'];
$sql = "INSERT INTO `thesisarchive` (thesis_no, accession_no, title, author, call_no, no_copies, copyright_year)
         SELECT thesis_no, accession_no, title, author, call_no, no_copies, copyright_year FROM `thesis` WHERE  thesis_no='$id'"; 
$sql_run = mysqli_query($db,$sql);

if($sql_run){
    $query = mysqli_query($db, "DELETE FROM `thesis` WHERE thesis_no = '$id'");
    if($query){
        $_SESSION['status'] = "Thesis Successfully Archived!";
 		$_SESSION['status_code'] = 'success';
        header('Location: ../public/librarian/view-thesis.php');
    }
}


