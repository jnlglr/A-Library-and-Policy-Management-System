<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
    if (!isAdmin()) {
        $_SESSION['status']  = "You must Sign-in first!";
        $_SESSION['status_code']  = "error";
        header('location: ../../../nyclibrary/sign-up_login.php');
    }

    /*if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header('location: ../nyclibrary/sign-up_login.php');
    }*/
?>


<?php include ('includes/header.php');?>
<?php include ('includes/navbar.php');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <?php include ('includes/topbar.php');?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Audit Logs Section</h1>
                    </div>

                    <?php 
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $audit = "SELECT * FROM `audittrail` ORDER BY audit_no desc";
                        $result = mysqli_query($db, $audit);
                    ?>

                    <!-- Content Row -->
                    <div class="container py-5">
	                    <div class="d-flex w-100">
	                    <h3 class="col-auto flex-grow-1"><b>Audit Trail</b></h3>
	                    <button class="btn btn-sm btn-primary rounded-0" type="button" onclick="location.reload()"><i class="fa fa-retweet"></i> Refresh List</button>
	                </div>
	                <hr>
                        <div class="card">
	                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="py-1 px-2">#</th>
                                        <th class="py-1 px-2">Date Time</th>
                                        <th class="py-1 px-2">Employee ID</th>
                                        <th class="py-1 px-2">Action Made</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            echo'
                                                <tr>
                                                    <td>'.$row["audit_no"].'</td>
                                                    <td>'.$row["date_time"].'</td>
                                                    <td>'.$row["emp_id"].'</td>
                                                    <td>'.$row["action_made"].'</td>
                                                </tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                    </hr>
                    <!-- Content Row -->
                <!-- /.container-fluid -->
            <!-- End of Main Content -->
        <!-- End of Content Wrapper -->
    <!-- End of Page Wrapper -->

 
<?php include ('includes/script.php');?>
<?php include ('includes/footer.php');?>