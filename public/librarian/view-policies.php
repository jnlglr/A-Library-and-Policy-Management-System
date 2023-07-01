<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
if (!isLibrarian()) {
	$_SESSION['status']  = "You must Sign-in first!";
    $_SESSION['status_code']  = "error";
	header('location: ../../../nyclibrary/sign-up_login.php');
}?>
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
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-900">Policies</h1>
                        
                        </h1>
                    </div>
                    </div>
                    <?php 
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $query = "SELECT * FROM `policy` ORDER BY title";
                        $result = mysqli_query($db, $query);
                    ?>
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <!--<h1 class="h5 mb-2 text-gray-700">Policies Table</h1>-->
                            <p class="mb-4 text-gray-60">This section allows you view the catalog of policies.</p>
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="h5 m-0 font-weight-bold text-primary">Policies Catalog</h6>
                                    </div>
                                        
                                    <div class="card-body shadow">
                                        <div class="table-responsive">
                                            <table id="data" class="table table-hover" id="dataTable" width="100%">
                                                <thead class="thead-light">
                                                    <tr>
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
                                                        <td><?= $row["title"];?></td>
                                                        <td><?= $row["author"];?></td>
                                                        <td><?= $row["policy_status"];?></td>
                                                        <td><?= $row["specific_request"];?></td>
                                                        <td><?= $row["in_charge"];?></td>
                                                        <td><?= $row["date_requested"];?></td>
                                                        <td><?= $row["offices"];?></td>
                                                        <td><?= $row["date_submitted"];?></td>
                                                        <td><?= $row["req_position_paper"];?></td>
                                                        <td><a target="_blank" href = "<?= $row["link"];?>"> <?= $row["link"];?> </a></td>

                                                       
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
    

   
    

   
