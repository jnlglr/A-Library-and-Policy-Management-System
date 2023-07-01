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

<!-- Add Modal -->


<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Add Policy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../../../nyclibrary/function/function.php"  method="post">
      <div class="modal-body">
            <label>Accession No.</label>
            <input type="text"  class="form-control risen shadow" name="accession_no" aria-describedby="" placeholder="" required>
        </div>
        <div class="modal-body">
            <label>Title</label>
            <input type="text"  class="form-control risen shadow" name="title" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Author</label>
            <input type="text" class="form-control risen shadow" name="author" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Call No.</label>
            <input type="text" class="form-control risen shadow" name="call_no" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">No. of copies</label>
            <input type="text" class="form-control risen shadow" name="no_copies" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Copyright Year</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="copyright_year" placeholder="YYYY" required>
        </div>

        <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="add_document">Add Document</button>
        </div>
        </form>
    </div>
  </div>
</div>
<!-- End -->

<!-- Edit Modal -->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Edit Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../../../nyclibrary/function/function.php"  method="post">
      <input type="hidden" name="no_docu" id="no_docu">
        <div class="modal-body">
            <label for="">Title</label>
            <input type="text"  class="form-control risen shadow" name="title" id="title" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Accession No.</label>
            <input type="text" class="form-control risen shadow" name="accession_no" id="accession_no" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Author</label>
            <input type="text" class="form-control risen shadow" name="author" id="author" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Call No.</label>
            <input type="text" class="form-control risen shadow" name="call_no" id="call_no" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">No of copies</label>
            <input type="text" class="form-control risen shadow" name="no_copies" id="no_copies" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Copyright Year</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="copyright_year" id="copyright_year" placeholder="YYYY-MM-DD" required>
        </div>

        <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="edit_doc">Update</button>
        </div>
        </form>
    </div>
  </div>
</div>
<!-- End -->      


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include ('includes/topbar.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-900">Documents</h1>
                        
                        </h1>
                    </div>
                    </div>
                    <?php 
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $query = "SELECT * FROM `documentarch` ORDER BY title";
                        $result = mysqli_query($db, $query);
                    ?>
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <p class="mb-4 text-gray-60">This page shows the archived documents.</p>
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="h5 m-0 font-weight-bold text-primary">Document Archives</h6>
                                    </div>
                                        
                                    <div class="card-body shadow">
                                        <div class="table-responsive">
                                            <table id="data" class="table table-hover" id="dataTable" width="100%">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Archive ID</th>
                                                        <th>Document Title</th>
                                                        <th>Accession No.</th>
                                                        <th>Author</th>
                                                        <th>Call No</th>
                                                        <th>Number of copies</th>
                                                        <th>Copyright Year</th>
                                                        
                                                        
                                                    </tr>
                                                </thead>
                                                <?php
                                                while($row = mysqli_fetch_array($result)):
                                                
                                                    ?>
                                                    
                                                    <tr>
                                                        <td><?= $row["no"];?></td>
                                                        <td><?= $row["title"];?></td>
                                                        <td><?= $row["accession_no"];?></td>
                                                        <td><?= $row["author"];?></td>
                                                        <td><?= $row["call_no"];?></td>
                                                        <td><?= $row["no_copies"];?></td>
                                                        <td><?= $row["copyright_year"];?></td>
                                                        
                                                    </tr>
                                                    <?php endwhile; ?>
                                                
                                                
                                                <tbody>
                                                </tbody>
                                            </table>
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

