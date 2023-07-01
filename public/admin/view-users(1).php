<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
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


            <!-- Delete Modal -->

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <label for="">Bill Number</label>
            <input type="text"  class="form-control risen shadow" name="emp_id" id="emp_id" aria-describedby="" placeholder="" required>
        </div>
            
        <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="del_user">Delete</button>
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
                    <h1 class="h3 mb-0 text-gray-900">View All Users</h1>
                        
                        </h1>
                    </div>
                    </div>
                    <?php 
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $query = "SELECT * FROM `user` ORDER BY emp_id";
                        $result = mysqli_query($db, $query);
                    ?>
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <!--<h1 class="h5 mb-2 text-gray-700">Policies Table</h1>-->
                            <p class="mb-4 text-gray-60">This page shows the list of users in the system.</p>
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="h5 m-0 font-weight-bold text-primary">Users Table</h6>
                                    </div>
                                        
                                    <div class="card-body shadow">
                                        <div class="table-responsive">
                                            <table id="data" class="table table-hover" id="dataTable" width="100%">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Employee ID</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Division</th>
                                                        <th>Type</th>
                                                        <th>E-mail</th>
                                                        <th>Admin Action</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <?php
                                                while($row = mysqli_fetch_array($result)):
                                                
                                                ?>
                                                    <tr>
                                                        <td><?= $row["emp_id"];?></td>
                                                        <td><?= $row["first_name"];?></td>
                                                        <td><?= $row["last_name"];?></td>
                                                        <?php
                                                        if ($row["division"] == 1):
                                                            ?>
                                                    <td>Administrative and Finance</td>
                                                    <?php endif; ?>
                                                    <?php
                                                        if ($row["division"] == 2):
                                                            ?>
                                                    <td>Social Marketing</td>
                                                    <?php endif; ?>
                                                    <?php
                                                        if ($row["division"] == 3):
                                                            ?>
                                                    <td>Planning, Monitoring, and Evaluation</td>
                                                    <?php endif; ?>
                                                    <?php
                                                        if ($row["division"] == 4):
                                                            ?>
                                                    <td>Policy Research</td>
                                                    <?php endif; ?>
                                                    <?php
                                                        if ($row["division"] == 5):
                                                            ?>
                                                    <td>Regional Youth Development</td>
                                                    <?php endif; ?>
                                                    <?php
                                                        if ($row["division"] == 6):
                                                            ?>
                                                    <td>Commission Proper</td>
                                                    <?php endif; ?>
                                                    
                                                    

                                                    <?php
                                                        if ($row["type"] == 1):
                                                            ?>
                                                    <td>Regular User</td>
                                                    <?php endif; ?>
                                                    <?php
                                                        if ($row["type"] == 2):
                                                            ?>
                                                    <td>IT Admin</td>
                                                    <?php endif; ?>
                                                    <?php
                                                        if ($row["type"] == 3):
                                                            ?>
                                                    <td>Librarian Admin</td>
                                                    <?php endif; ?>
                                                    <?php
                                                        if ($row["type"] == 4):
                                                            ?>
                                                    <td>Research Admin</td>
                                                    <?php endif; ?>
                                                   
                                                        <td><?= $row["email"];?></td>
                                                        <td>
                                                            
                                                        <button type="button" class="btn btn-outline-info del_btn" data-toggle="modal" data-target="#delete"> DELETE </button>
                                                        <!--<a href="../../../nyclibrary/function/delete-user.php?emp_id=<?= $row["emp_id"]; ?>" type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-danger"  name="del_btn"> Delete </a>-->
                                                    
                                                        </td>
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

<script>
$(document).ready(function(){
    $('#data').DataTable();
})
</script>

<?php include ('includes/script.php');?>


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <script>
$(document).ready(function(){
    $('.del_btn').on('click', function(){
        $('#delete').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);
        $('#emp_id').val(data[0]);
        $('#first_name').val(data[1]);
    });

    
});

</script> 
<?php include ('includes/footer.php');?>
    

   
