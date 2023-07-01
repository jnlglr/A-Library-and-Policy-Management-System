<?php 


// // connect to database
include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
$book_id = $_GET['no_book'];
$emp_id = $_GET['emp_id'];
$isbn = $_GET['isbn'];
$no_copies = $_GET['no_copies'];
$date = date("Y-m-d");
// 1 week forward
$due = date('y-m-d', strtotime('+7 days'));
$sql = "INSERT INTO `reservation` (emp_id, book_id_reserv, isbn, date_borrowed, due_date)
         VALUES ('$emp_id', '$book_id', '$isbn', '$date', '$due')";
$sql1 = "UPDATE `book` SET no_copies = no_copies - 1 WHERE no_book = '$book_id'";
$sql_run1 = mysqli_query($db,$sql1);
$sql_run = mysqli_query($db,$sql);

if($sql_run && $sql_run1){
        
        $_SESSION['status'] = "Book Successfully Reserved!";
 		$_SESSION['status_code'] = 'success';
        header('Location: ../public/researcher/reserve-book.php');
    
} else{
        $_SESSION['status'] = "Error!";
 		$_SESSION['status_code'] = 'error';
        header('Location: ../public/researcher/reserve-book.php');
}