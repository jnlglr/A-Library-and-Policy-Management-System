<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
if (!isAdmin()) {
	$_SESSION['status']  = "You must Sign-in first!";
    $_SESSION['status_code']  = "error";
	header('location: ../../../nyclibrary/sign-up_login.php');
}?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/header.php');?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/navbar.php');?>

      

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            <!-- TopBar -->
            <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/topbar.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-900">My Book Reservations</h1>
                    </div>
                    <?php 
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $currentUser = $_SESSION['user']['emp_id'];
                        $query = "SELECT * FROM `reservation` WHERE emp_id = '$currentUser'";
                        $result = mysqli_query($db, $query);
                        
                        
                        ?>
                       
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <p class="mb-4 text-gray-60">This catalog shows the reservations you've made.</p>
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="h5 m-0 font-weight-bold text-primary">My Book Reservations</h6>
                                    </div>
                                        
                                    <div class="card-body shadow">
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="dataTable" width="100%">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Title</th>
                                                    <th>ISBN</th>
                                                    <th>Date Borrowed</th>
                                                    <th>Date Due</th>
                                                    
                                                </tr>
                                                </thead>
                                                <?php
                                                while($row = mysqli_fetch_array($result)):
                                                    
                                                    ?>
                                                    <tr>
                                                    
                                                        <?php 

                                                        $no_book = $row["book_id_reserv"];
                                                        $query1 = "SELECT * FROM `book` WHERE no_book = '$no_book'";
                                                        $result1 = mysqli_query($db, $query1);
                                                        if($result1){
                                                        if(mysqli_num_rows($result1)>0){
                                                        while($row1 = mysqli_fetch_array($result1)){
                                                        echo '<td>'.$row1["title"].'</td>';
                                                            }
                                                        }
                                                        }
                                                        ?>
                                                        <td><?= $row["isbn"];?></td>
                                                        <td><?= $row["date_borrowed"];?></td>
                                                        <td><?= $row["due_date"];?></td>
                                                       
                                                    </tr>
                                                    <?php endwhile; ?>
                                                
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

 
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/script.php');?>
<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/admin/includes/footer.php');?>

    

   
