<?php 


// connect to database
include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
$id = $_GET['no_magazine'];
$sql = "INSERT INTO `magazinearchive` (no_magazine, magazine_publisher, magazine_title, no_copies, author, month, year, remarks)
         SELECT no_magazine, magazine_publisher, magazine_title, no_copies, author, month, year, remarks FROM `magazine` WHERE  no_magazine='$id'"; 
$sql_run = mysqli_query($db,$sql);

if($sql_run){
    $query = mysqli_query($db, "DELETE FROM `magazine` WHERE no_magazine = '$id'");
    if($query){
        $_SESSION['status'] = "Magazine Successfully Archived!";
 		$_SESSION['status_code'] = 'success';
        header('Location: ../public/librarian/view-magazines.php');
    }
}


