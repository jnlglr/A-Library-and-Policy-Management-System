<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
if (!isLibrarian()) {
	$_SESSION['status']  = "You must Sign-in first!";
    $_SESSION['status_code']  = "error";
	header('location: ../../../nyclibrary/sign-up_login.php');
}?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/librarian/includes/header.php');?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/librarian/includes/navbar.php');?>

      

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/librarian/includes/topbar.php');?>

            <?php 
                ob_start();
                if (isset($_SESSION['user'])){
                    // echo "". $_SESSION['user']['emp_id']. " " .$_SESSION['user']['last_name']. "";
                    echo "<br>";
                }
                ob_end_flush();
            
            ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php 
                    // connect to database
                        
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $currentUser = $_SESSION['user']['emp_id'];
                        $query = "SELECT * FROM `book` ORDER BY title";
                        $result = mysqli_query($db, $query);

                        $query1 = "SELECT * FROM `user` WHERE emp_id = '$currentUser'";
                        $result1 = mysqli_query($db, $query1);

                                if($result1){
                                    if(mysqli_num_rows($result1)>0){
                                        while($row1 = mysqli_fetch_array($result1)){
                                        // echo $emp_id = $row1["emp_id"];
                                        }
                                    }
                                }


                        
                       
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-900">Reserved Books</h1>
                        
                        </h1>
                    </div>
                    </div>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <p class="mb-4 text-gray-60">This shows the list of reserved books.</p>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="h5 m-0 font-weight-bold text-primary">Reserved Books</h6>
                            </div>

                            <div class="card-body shadow">
                                <div class="table-responsive">
                                <table id="data" class="table table-hover" id="dataTable" width="100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Title</th>
                                                <th>Accession No.</th>
                                                <th>Author</th>
                                                <th>Call No.</th>
                                                <th>Number of Copies</th>
                                                <th>Copyright Year</th>
                                                <th>Remarks</th>
                                                <th>Category</th>
                                                <th>ISBN</th>
                                                <th>Reserve Book</th>
                                            </tr>
                                        </thead>
                                        <?php
                                                while($row = mysqli_fetch_array($result)):
                                                    
                                                    ?>
                                                 
                                                    <tr>
                                                    <td><?= $row["title"];?></td>
                                                    <td><?= $row["accession_no"];?></td>
                                                    <td><?= $row["author"];?></td>
                                                    <td><?= $row["call_no"];?></td>
                                                    <td><?= $row["no_copies"];?></td>
                                                    <td><?= $row["copyright_year"];?></td>
                                                    <td><?= $row["remarks"];?></td>
                                                    <td><?= $row["category"];?></td>
                                                    <td><?= $row["isbn"];?></td>
                                                    <?php
                                                        if ($row["no_copies"] > 0):
                                                            ?>
                                                    <td>
                                                        <a href="../../../nyclibrary/function/book-reservation-librarian.php?no_book=<?= $row["no_book"];?>&isbn=<?= $row["isbn"];?>&emp_id=<?= $currentUser;?>" type="button" class="btn btn-success reserve_btn">Reserve</a>
                                                    </td>
                                                    <?php endif; ?> 
                                                    <?php
                                                        if ($row["no_copies"] == 0):
                                                            ?>
                                                    <td>
                                                        <a type="button" class="btn btn-dark "> Out of Stock
                                                       
                                                    </a>
                                                    </td>
                                                    <?php endif; ?> 
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
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/librarian/includes/script.php');?>
<script>
 $('.reserve_btn').on('click', function(e){
        e.preventDefault();
        const href= $(this).attr('href')

        Swal.fire({
        title: 'Are you sure?',
        text: "Reservation will be made after proceeding!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#00b4db',
        cancelButtonColor: ' #efbf3a',
        confirmButtonText: 'Yes, reserve it!'
        }).then((result) => {
        if (result.value) {
            document.location.href = href;
  }
})
    })
</script> 
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/librarian/includes/footer.php');?>

    

   
