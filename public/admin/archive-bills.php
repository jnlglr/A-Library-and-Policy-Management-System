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
                    </div>
                </div>
        </div>
    </div>

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
                $('#no_cd').val(data[0]);
                $('#title').val(data[1]);
            });
        });
    </script> 
    <?php include ('includes/footer.php');?>