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
            <!-- TopBar -->
            <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/users/includes/topbar.php');?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php 
               
                
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $query = "SELECT * FROM `returned` ORDER BY return_id";
                        $result = mysqli_query($db, $query);
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-900">Returned</h1>
                        
                        </h1>
                    </div>
                    </div>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <p class="mb-4 text-gray-60">This page gives access to the returned books.</p>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="h5 m-0 font-weight-bold text-primary">Returned Books Catalog</h6>
                            </div>

                            <div class="card-body shadow">
                                <div class="table-responsive">
                                    <table id="data" class="table table-hover" id="dataTable" width="100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Employee ID</th>
                                                <th>Book ID</th>
                                                <th>ISBN</th>
                                                <th>Date Borrowed</th>
                                                <th>Due Date</th>
                                                <th>Date Returned</th>
                                               
                                            </tr>
                                        </thead>
                                        <?php
                                                while($row = mysqli_fetch_array($result)):
                                                
                                                    ?>
                                                    <tr>
                                                    <td><?= $row["emp_id"];?></td>
                                                    <td><?= $row["book_id"];?></td>
                                                    <td><?= $row["isbn"];?></td>
                                                    <td><?= $row["date_borrowed"];?></td>
                                                    <td><?= $row["due_date"];?></td>
                                                    <td><?= $row["date_returned"];?></td>
                                                    <!-- <td>
                                                        <button type="button" class="btn btn-outline-info edit_btn" data-toggle="modal" data-target="#edit"> EDIT </button>
                                                        <a href="../../../nyclibrary/function/archive-thesis.php?thesis_no=<?= $row["thesis_no"]; ?>" type="button" class="btn btn-outline-warning archive_btn"> Archive </a>
                                                    </td> -->
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

<script>
$(document).ready(function(){
    $('.edit_btn').on('click', function(){
        $('#edit').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);
        $('#senatebill_id').val(data[0]);
        $('#title').val(data[1]);
        $('#author').val(data[2]);
        $('#bill_action').val(data[3]);
        $('#in_charge').val(data[4]);
        $('#date_filing').val(data[5]);
    });

    $('.archive_btn').on('click', function(e){
        e.preventDefault();
        const href= $(this).attr('href')

        Swal.fire({
        title: 'Are you sure?',
        text: "This data will be saved to the archive table, and will not be viewed by other users!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#00b4db',
        cancelButtonColor: ' #efbf3a',
        confirmButtonText: 'Yes, archive it!'
        }).then((result) => {
        if (result.value) {
            document.location.href = href;
  }
})
    })
});

</script> 
<?php include ('includes/footer.php');?>