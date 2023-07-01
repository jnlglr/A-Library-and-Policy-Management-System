<?php 


// connect to database
include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
$id = $_GET['reservation_id'];
$book_id = $_GET['book_id_reserv'];
$date_time = date_create('Asia/Manila')->format('Y	-m-d H:i:s');
$sql = "INSERT INTO `returned` (reservation_id, emp_id, book_id, isbn, date_borrowed, due_date)
         SELECT reservation_id, emp_id, book_id_reserv, isbn, date_borrowed, due_date FROM `reservation`  WHERE reservation_id ='$id'";

$sql1 = "UPDATE `book` SET no_copies = no_copies + 1 WHERE no_book = '$book_id'";
$sql_run = mysqli_query($db,$sql);

$sql_run1 = mysqli_query($db,$sql1);

if($sql_run && $sql_run1){
    $query = mysqli_query($db, "DELETE FROM `reservation` WHERE reservation_id = '$id'");
    if($query){
        $_SESSION['status'] = "Record Successfully Recorded!";
 		$_SESSION['status_code'] = 'success';
        header('Location: ../public/librarian/view-returned.php');
    }
}