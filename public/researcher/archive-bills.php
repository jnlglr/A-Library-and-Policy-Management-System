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
            <button type="submit" class="btn btn-primary" name="add_bill_btn">Add Bill</button>
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

            <input type="hidden" name="senatebill_id" id="senatebill_id">

            <input type="text"  class="form-control risen shadow" name="title" id="title" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Author</label>
            <input type="text" class="form-control risen shadow" name="author" id="author" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Action</label>
            <input type="text" class="form-control risen shadow" name="bill_action" id="bill_action" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Committee In-Charge</label>
            <input type="text" class="form-control risen shadow" name="in_charge" id="in_charge" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Date Filing</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="date_filing" id="date_filing" placeholder="YYYY-MM-DD" required>
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
            <button type="submit" class="btn btn-primary" name="edit_bill">Update</button>
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
                        <h1 class="h3 mb-0 text-gray-900">Senate and House Bills</h1>
                        
                        </h1>
                    </div>
                    </div>
                    <?php 
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $query = "SELECT * FROM `senatearchive` ORDER BY no";
                        $result = mysqli_query($db, $query);
                    ?>
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <!--<h1 class="h5 mb-2 text-gray-700">Policies Table</h1>-->
                            <p class="mb-4 text-gray-60">This page shows the archived bills.</p>
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="h5 m-0 font-weight-bold text-primary">Senate and House Bill Archives</h6>
                                    </div>
                                        
                                    <div class="card-body shadow">
                                        <div class="table-responsive">
                                            <table id="data" class="table table-hover" id="dataTable" width="100%">
                                                <thead class="thead-light">
                                                    <tr>
                                                    <th>ID</th>
                                                        <th>Bill Number</th>
                                                        <th>Bill Title</th>
                                                        <th>Date Filed</th>
                                                        <th>Subject</th>
                                                        <th>Sponsor</th>
                                                        <th>Committee In-Charge</th>
                                                        <th>Updates</th>
                                                        <th>Link</th>
                                                        <th>Center of Participation</th>
                                                        
                                                        
                                                    </tr>
                                                </thead>
                                                <?php
                                                while($row = mysqli_fetch_array($result)):
                                                
                                                ?>
                                                    <tr>
                                                    <td><?= $row["no"];?></td>
                                                        <td><?= $row["bill_number"];?></td>
                                                        <td><?= $row["title"];?></td>
                                                        <td><?= $row["date_filed"];?></td>
                                                        <td><?= $row["subject"];?></td>
                                                        <td><?= $row["sponsor"];?></td>
                                                        <td><?= $row["in_charge"];?></td>
                                                        <td><?= $row["updates"];?></td>
                                                        <td><?= $row["link"];?></td>
                                                        <td><?= $row["center_of_participation"];?></td>
                                                        
                                                        
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

    

   
