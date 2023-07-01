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
                        <h1 class="h3 mb-0 text-gray-900">Books</h1>
                    </div>
                    <?php 
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $query = "SELECT * FROM `book` ORDER BY title";
                        $result = mysqli_query($db, $query);
                    ?>
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <p class="mb-4 text-gray-60">This catalog shows the list of books in the National Youth Commission Library.</p>
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="h5 m-0 font-weight-bold text-primary">Books Catalog</h6>
                                    </div>
                                        
                                    <div class="card-body shadow">
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="dataTable" width="100%">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Accession No.</th>
                                                    <th>Title</th>
                                                    <th>Author</th>
                                                    <th>Call No.</th>
                                                    <th>Number of Copies</th>
                                                    <th>Copyright Year</th>
                                                    <th>Remarks</th>
                                                    <th>Category</th>
                                                    <th>ISBN</th>
                                                </tr>
                                                </thead>
                                                <?php
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo'
                                                    <tr>
                                                        <td>'.$row["accession_no"].'</td>
                                                        <td>'.$row["title"].'</td>
                                                        <td>'.$row["author"].'</td>
                                                        <td>'.$row["call_no"].'</td>
                                                        <td>'.$row["no_copies"].'</td>
                                                        <td>'.$row["copyright_year"].'</td>
                                                        <td>'.$row["remarks"].'</td>
                                                        <td>'.$row["category"].'</td>
                                                        <td>'.$row["isbn"].'</td>
                                                    </tr>
                                                    ';
                                                }
                                                ?>
                                                
                                                <tbody>
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
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

 
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/users/includes/script.php');?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/users/includes/footer.php');?>

    

   
