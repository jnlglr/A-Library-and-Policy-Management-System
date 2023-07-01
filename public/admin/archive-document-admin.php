<?php 


// connect to database
include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
$id = $_GET['no_docu'];
$sql = "INSERT INTO `documentarch` (no_docu, accession_no, title, author, call_no, no_copies, copyright_year)
         SELECT no_docu, accession_no, title, author, call_no, no_copies, copyright_year FROM `document` WHERE  no_docu='$id'"; 
$sql_run = mysqli_query($db,$sql);

if($sql_run){
    $query = mysqli_query($db, "DELETE FROM `document` WHERE no_docu = '$id'");
    if($query){
        $_SESSION['status'] = "Document Successfully Archived!";
 		$_SESSION['status_code'] = 'success';
        header('Location: ../public/admin/view-documents.php');
    }
}



// $sql = "INSERT INTO `documentarch` (no_docu, accession_no, title, author, call_no, no_copies, copyright_year)
// SELECT (no_docu, accession_no, title, author, call_no, no_copies, copyright_year) FROM `document` WHERE no_docu = '$id'";
// $sql_run = mysqli_query($db,$sql);
// if ($sql_run){
//     $query = "DELETE FROM `document` WHERE no_docu = '$id'";
//     $query_run = mysqli_query($db, $query);
//     if($query_run){
//         $_SESSION['status'] = "Document Successfully Archived!";
// 		$_SESSION['status_code'] = 'success';
//         header('Location: ../public/librarian/view-documents.php?m=1');
//     }
// }


// $sql = "INSERT INTO `documentarch` (no_docu, accession_no, title, author, call_no, no_copies, copyright_year)
//         SELECT * FROM `document` WHERE  no_docu='$id'"; 
