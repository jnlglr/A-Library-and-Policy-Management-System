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
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/researcher/includes/header.php');?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/researcher/includes/navbar.php');?>



<!-- Add Modal -->


<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Add Monthly Policy Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../../../nyclibrary/function/function.php"  method="post">
      <!-- <label>Enter Employee ID</label> -->
      <input type="hidden" name="emp_id" value="<?php 
            ob_start();
            if (isset($_SESSION['user'])){
            echo "". $_SESSION['user']['emp_id']. "";
            }
            ob_end_flush();
            ?>" class="form-control risen shadow" name="title" aria-describedby="" placeholder="" required>
        <div class="modal-body">
            <label>Number of Approved Policies This Month</label>
            <input type="text"  class="form-control risen shadow" name="policy_total" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Month</label>
            <input type="text" class="form-control risen shadow" name="month" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Year</label>
            <input type="text" class="form-control risen shadow" name="year" aria-describedby="" placeholder="" required>
        </div>

             
        <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="add_report">Add Policy Report</button>
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
            <!-- TopBar -->
            <?php include ('includes/topbar.php');?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                    </div>

                        <!-- Content Row Policies-->
                        <div class="row">
                            <!-- Policy updates -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Total Number of Policies</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-700">
                                                <?php $conn = mysqli_connect('localhost', 'u174976054_dbnyclibrary', '~99?]I]$t$EPQQeF', 'u174976054_nyclibrary');
                                                $sql = "SELECT * FROM `policy`";
                                                $result = $conn->query($sql);
                                                $rows = mysqli_num_rows($result);
                                                echo "$rows";
                                            
                                            ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-check-double fa-2x text-gray-500"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Number of Approved Policies this Month</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-700">Month of 
                                                <?php $conn = mysqli_connect('localhost', 'u174976054_dbnyclibrary', '~99?]I]$t$EPQQeF', 'u174976054_nyclibrary');
                                                $sql = "SELECT * FROM monthlypolicy ORDER BY policy_no DESC LIMIT 1";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows >0){
                                                while($row = $result-> fetch_assoc()){
                                                    echo "". $row["month"]. "";
                                                }
                                            }
                                            ?>: 
                                                <?php $conn = mysqli_connect('localhost', 'u174976054_dbnyclibrary', '~99?]I]$t$EPQQeF', 'u174976054_nyclibrary');
                                                $sql = "SELECT * FROM monthlypolicy ORDER BY policy_no DESC LIMIT 1";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows >0){
                                                while($row = $result-> fetch_assoc()){
                                                    echo "". $row["policy_total"]. "";
                                                }
                                            }
                                            ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-check-circle fa-2x text-gray-500"></i>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Number of Pending Policies</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-700">
                                                <?php $conn = mysqli_connect('localhost', 'u174976054_dbnyclibrary', '~99?]I]$t$EPQQeF', 'u174976054_nyclibrary');
                                                $sql = "SELECT * FROM `policy` WHERE policy_status='pending'";
                                                $result = $conn->query($sql);
                                                $rows = mysqli_num_rows($result);
                                                echo "$rows";
                                            
                                            ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clock fa-2x text-gray-500"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button class="btn btn-outline-info btn-lg btn-block" data-toggle="modal" data-target="#add">Click here to add the monthly policy report</button>
                        <br>

                        <!-- Content Row Announcent -->
                        <div class="row">
                            <!-- Card Details -->
                            <div class="col-xl-12 col-lg-7">
                                <div class="card shadow mb-4">
                                <!-- Announcement Message -->
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-gray-900">Announcement</h6>
                                    </div>
                                    <div class="card-body">
                                        <h7 class="card-title"></h7>
                                        <p class="card-text">
                                        <?php $conn = mysqli_connect('localhost', 'u174976054_dbnyclibrary', '~99?]I]$t$EPQQeF', 'u174976054_nyclibrary');
                                    $sql = "SELECT * FROM announcement ORDER BY announcement_id DESC LIMIT 1";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows >0){
                                        while($row = $result-> fetch_assoc()){
                                            echo "". $row["message"]. "";
                                        }
                                    }
                                    ?>
                                        </p>
                                        <!-- <a href="#" class="btn bg-secondary text-white">Open full article</a> -->
                                    </div>
                            </div>
                            <div class>
                               
                                
                                    
                            </div>
                        </div>  
                    <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

 
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/researcher/includes/script.php');?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/researcher/includes/footer.php');?>

    

   
