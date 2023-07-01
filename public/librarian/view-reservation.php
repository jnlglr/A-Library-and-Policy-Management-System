<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
if (!isLibrarian()) {
	$_SESSION['status']  = "You must Sign-in first!";
    $_SESSION['status_code']  = "error";
    header('location: ../../../nyclibrary/sign-up_login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header('location: ../nyclibrary/sign-up_login.php');
}
?>


<?php include ('includes/header.php');?>
<?php include ('includes/navbar.php');?>

      

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/librarian/includes/topbar.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php 
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $query = "SELECT * FROM `reservation`";
                        $result = mysqli_query($db, $query);
                    ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-900">Book Reservation</h1>
                        
                        </h1>
                    </div>

                    <!-- Page Heading -->
                    <p class="mb-4 text-gray-60">This page gives access to books reservation.</p>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="h5 m-0 font-weight-bold text-primary">Book Reservation</h6>
                            </div>

                            <div class="card-body shadow">
                                <div class="table-responsive">
                                    <table id="data" class="table table-hover" id="dataTable" width="100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Reservation ID</th>
                                                <th>Employee ID</th>
                                                <th>Book ID</th>
                                                <th>ISBN</th>
                                                <th>Date Borrowed</th>
                                                <th>Due Date</th>
                                                <th>Librarian Action</th>
                                               
                                            </tr>
                                        </thead>
                                         <?php
                                                while($row = mysqli_fetch_array($result)):
                                                
                                                    ?>
                                                    <tr>
                                                    <td><?= $row["reservation_id"];?>
                                                    <td><?= $row["emp_id"];?>
                                                    <td><?= $row["book_id_reserv"];?></td>
                                                    <td><?= $row["isbn"];?></td>
                                                    <td><?= $row["date_borrowed"];?></td>
                                                    <td><?= $row["due_date"];?></td>
                                                    <td>
                                                        <a href="../../../nyclibrary/function/book-returned.php?reservation_id=<?= $row["reservation_id"];?>&book_id_reserv=<?= $row['book_id_reserv'];?>" type="button" class="btn btn-success reserve_btn"> Returned </a>
                                                    </td>
                                                    </tr>
                                                    <?php endwhile; ?> 
                                                <tbody>
                                                  
                                    </table>
                                </div>
                                
                            </div>
                            
                        </div>

                    </div>
                    <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
<script>
    $(document).ready(function(){
    $('#data').DataTable();
})
</script>
<?php include ('includes/script.php');?>
<?php include ('includes/footer.php');?>

    

   
