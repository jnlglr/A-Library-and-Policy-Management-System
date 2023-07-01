<?php 
    include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
    if (!isAdmin()) {
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
    <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/header.php');?>
    <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/navbar.php');?>
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">

            <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/topbar.php');?>

            <!-- Modal for announcement 1 -->
            <div class="modal fade" id="announcement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header"> 
                    <h5 class="modal-title" id="exampleModalLabel">Create Announcement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="../../../nyclibrary/function/function.php">
                <div class="modal-body">
                <div class="form-group">
                <label for="exampleFormControlTextarea1">Enter announcement here</label>
                <!-- <label>Enter Employee ID</label> -->
      <input type="hidden" name="emp_id" value="<?php 
            ob_start();
            if (isset($_SESSION['user'])){
            echo "". $_SESSION['user']['emp_id']. "";
            }
            ob_end_flush();
            ?>" class="form-control risen shadow" name="title" aria-describedby="" placeholder="" required>
                <div class="mb-3">                      
                    <textarea class="form-control" name="message" rows="10"></textarea>
                </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="save_announcement">Save Announcement</button>
                </div>
                </form>
                </div>
            </div>
            </div>

            <!-- Modal for No. of Policies -->
            <div class="modal fade" id="no_policies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header"> 
                    <h5 class="modal-title" id="exampleModalLabel">Edit Announcement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="../../../nyclibrary/function/function.php">
                <div class="modal-body">
                <div class="form-group">
                <label for="exampleFormControlTextarea1">Enter announcement here</label>
                <input type="hidden" name="user_id" value="<?php 
                    ob_start();
                    if (isset($_SESSION['user'])){
                    echo "". $_SESSION['user']['id']. "";
                    }
                    ob_end_flush();
                    ?>">
                                                
                <div class="mb-3">                      
                    <textarea class="form-control" name="message" rows="10"></textarea>
                </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="save_no_policies">Save Announcement</button>
                </div>
                </form>
                </div>
            </div>
            </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                        
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            <?php 
                                ob_start();
                                if (isset($_SESSION['user'])){
                                    echo "Welcome Back, ". $_SESSION['user']['first_name']. "!";
                                    echo "<br>";
                                
                                }
                                ob_end_flush();
                            ?>
                        </h1>
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
                        
                        <!-- Content Row Librarian Dashboard-->
                        <div class="row">
                            <!-- Book updates -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card shadow h-100 py-2">
                                    <div class="card-body bg-success">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">
                                                    Total Number of Books</div>
                                                <div class="h5 mb-0 font-weight-bold text-light">
                                                    <?php $conn = mysqli_connect('localhost', 'u174976054_dbnyclibrary', '~99?]I]$t$EPQQeF', 'u174976054_nyclibrary');
                                                        $sql = "SELECT * FROM `book`";
                                                        $result = $conn->query($sql);
                                                        $rows = mysqli_num_rows($result);
                                                        echo "$rows";
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-bookmark fa-2x text-light"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card shadow h-100 py-2">
                                    <div class="card-body bg-info">
                                        <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">
                                                    Total Number of Reservations</div>
                                                <div class="h5 mb-0 font-weight-bold text-light">
                                                    <?php $conn = mysqli_connect('localhost', 'u174976054_dbnyclibrary', '~99?]I]$t$EPQQeF', 'u174976054_nyclibrary');
                                                        $sql = "SELECT * FROM `reservation`";
                                                        $result = $conn->query($sql);
                                                        $rows = mysqli_num_rows($result);
                                                        echo "$rows";
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-check fa-2x text-light"></i>
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
                                        <button class="btn bg-secondary text-white" data-toggle="modal" data-target="#announcement">Create Announcement</button>
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

 
    <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/script.php');?>
    <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/footer.php');?>