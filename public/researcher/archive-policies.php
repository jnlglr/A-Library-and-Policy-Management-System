<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
if (!isResearcher()) {
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
            <label>Title</label>
            <input type="text"  class="form-control risen shadow" name="title" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Author</label>
            <input type="text" class="form-control risen shadow" name="author" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Action</label>
            <input type="text" class="form-control risen shadow" name="bill_action" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Committee In-Charge</label>
            <input type="text" class="form-control risen shadow" name="in_charge" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Date Filing</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="date_filing" placeholder="YYYY-MM-DD" required>
        </div>

            <input type="hidden" name="user_id" value="
            <?php 
            ob_start();
            if (isset($_SESSION['user'])){
            echo "". $_SESSION['user']['id']. "";
            }
            ob_end_flush();
            ?>">
        <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="add_policy">Add Bill</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Policy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../../../nyclibrary/function/function.php"  method="post">
        <div class="modal-body">
            <label for="">Title</label>

            <input type="hidden" name="policy_id" id="policy_id">

            <input type="text"  class="form-control risen shadow" name="title" id="title" aria-describedby="" placeholder="">
        </div>

        <div class="modal-body">
            <label for="">Author</label>
            <input type="text" class="form-control risen shadow" name="author" id="author" aria-describedby="" placeholder="">
        </div>

        <div class="modal-body">
            <label for="">Status</label>
            <input type="text" class="form-control risen shadow" name="policy_status" id="policy_status" aria-describedby="" placeholder="">
        </div>

        <div class="modal-body">
            <label for="">Committee In-Charge</label>
            <input type="text" class="form-control risen shadow" name="in_charge" id="in_charge" aria-describedby="" placeholder="">
        </div>

        <div class="modal-body">
            <label for="">Date Submitted</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="date_submitted" id="date_submitted" >
        </div>

            <input type="hidden" name="user_id" value="
            <?php 
            ob_start();
            if (isset($_SESSION['user'])){
            echo "". $_SESSION['user']['id']. "";
            }
            ob_end_flush();
            ?>">
        <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="edit_policy">Update</button>
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
                        <h1 class="h3 mb-0 text-gray-900">Policies</h1>
                        
                        </h1>
                    </div>
                    </div>
                    <?php 
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $query = "SELECT * FROM `policyarchive` ORDER BY no";
                        $result = mysqli_query($db, $query);
                    ?>
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <!--<h1 class="h5 mb-2 text-gray-700">Policies Table</h1>-->
                            <p class="mb-4 text-gray-60">This page shows the archived policies.</p>
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="h5 m-0 font-weight-bold text-primary">Policies Archive</h6>
                                    </div>
                                        
                                    <div class="card-body shadow">
                                        <div class="table-responsive">
                                            <table id="data" class="table table-hover" id="dataTable" width="100%">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Policy Title</th>
                                                        <th>Author</th>
                                                        <th>Status</th>
                                                        <th>Specific Request</th>
                                                        <th>Committee In-Charge</th>
                                                        <th>Date Requested</th>
                                                        <th>Offices</th>
                                                        <th>Date Submitted</th>
                                                        <th>Requires Position Paper</th>
                                                        <th>Link</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <?php
                                                while($row = mysqli_fetch_array($result)):
                                                ?>
                                                    <tr>
                                                        <td><?= $row["no"];?></td>
                                                        <td><?= $row["title"];?></td>
                                                        <td><?= $row["author"];?></td>
                                                        <td><?= $row["policy_status"];?></td>
                                                        <td><?= $row["specific_request"];?></td>
                                                        <td><?= $row["in_charge"];?></td>
                                                        <td><?= $row["date_requested"];?></td>
                                                        <td><?= $row["offices"];?></td>
                                                        <td><?= $row["date_submitted"];?></td>
                                                        <td><?= $row["req_position_paper"];?></td>
                                                        <td><?= $row["link"];?></td> 
                                                       
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

    

   
