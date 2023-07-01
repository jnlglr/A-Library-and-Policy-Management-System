<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
if (!isLoggedIn()) {
	$_SESSION['status']  = "You must Sign-in first!";
    $_SESSION['status_code']  = "error";
	header('location: ../../../nyclibrary/sign-up_login.php');
}?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/users/includes/header.php');?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/users/includes/navbar.php');?>



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            <!-- TopBar -->
            <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/users/includes/topbar.php');?>
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

 
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/users/includes/script.php');?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/users/includes/footer.php');?>

    

   
