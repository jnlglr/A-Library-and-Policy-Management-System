<?php 


// connect to database
include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
$id = $_GET['no_book'];
$sql = "INSERT INTO `bookarchive` (no_book, emp_id, accession_no, title, author, call_no, no_copies, copyright_year, remarks, category, isbn)
         SELECT no_book, emp_id, accession_no, title, author, call_no, no_copies, copyright_year, remarks, category, isbn FROM `book` WHERE  no_book='$id'"; 
$sql_run = mysqli_query($db,$sql);

if($sql_run){
    $query = mysqli_query($db, "DELETE FROM `book` WHERE no_book = '$id'");
    if($query){
        $_SESSION['status'] = "Book Successfully Archived!";
 		$_SESSION['status_code'] = 'success';
        header('Location: ../public/librarian/view-books.php');
    }
}

