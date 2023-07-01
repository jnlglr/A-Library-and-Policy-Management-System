<?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/function.php');
if (!isLibrarian()) {
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
            <label>Magazine Publisher</label>
            <input type="text"  class="form-control risen shadow" name="magazine_publisher" aria-describedby="" placeholder="" required>
        </div>
        <div class="modal-body">
            <label>Title</label>
            <input type="text"  class="form-control risen shadow" name="title" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">No. of copies</label>
            <input type="text" class="form-control risen shadow" name="no_copies" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Author</label>
            <input type="text" class="form-control risen shadow" name="author" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Month</label>
            <input type="text" class="form-control risen shadow" name="month" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Year</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="year" placeholder="YYYY" required>
        </div>

        <div class="modal-body">
            <label for="">Remarks</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="remarks" placeholder="" required>
        </div>

        <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="add_magazine">Add Magazine</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Journal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../../../nyclibrary/function/function.php"  method="post">
      <input type="hidden" name="thesis_no" id="thesis_no">
        <div class="modal-body">
            <label for="">Title</label>
            <input type="text"  class="form-control risen shadow" name="magazine_title" id="magazine_title" aria-describedby="">
        </div>

        <div class="modal-body">
            <label for="">Publisher</label>
            <input type="text" class="form-control risen shadow" name="magazine_publisher" id="magazine_publisher" aria-describedby="">
        </div>

        <div class="modal-body">
            <label for="">Author</label>
            <input type="text" class="form-control risen shadow" name="author" id="author" aria-describedby="">
        </div>

        <div class="modal-body">
            <label for="">No. of Copies</label>
            <input type="text" class="form-control risen shadow" name="no_copies" id="no_copies" aria-describedby="">
        </div>

        <div class="modal-body">
            <label for="">Month</label>
            <input type="text" class="form-control risen shadow" name="month" id="month" aria-describedby="">
        </div>

        <div class="modal-body">
            <label for="">Year</label>
            <input type="text" class="form-control risen shadow" name="year" id="year" aria-describedby="">
        </div>

        <div class="modal-body">
            <label for="">Copyright Year</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="remarks" id="remarks">
        </div>

        <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="edit_magazine">Update</button>
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
                        <h1 class="h3 mb-0 text-gray-900">Magazines</h1>
                        
                        </h1>
                    </div>
                    </div>
                    <?php 
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $query = "SELECT * FROM `magazinearchive` ORDER BY magazine_title";
                        $result = mysqli_query($db, $query);
                    ?>
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            
                            <p class="mb-4 text-gray-60">This page shows the archived magazines.</p>
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="h5 m-0 font-weight-bold text-primary">Magazines Archive</h6>
                                    </div>
                                        
                                    <div class="card-body shadow">
                                        <div class="table-responsive">
                                            <table id="data" class="table table-hover" id="dataTable" width="100%">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Archive ID</th>
                                                        <th>Title</th>
                                                        <th>Publisher</th>
                                                        <th>Author</th>
                                                        <th>No. of Copies</th>
                                                        <th>Month</th>
                                                        <th>Year</th>
                                                        <th>Remarks</th>
                                                    
                                                        
                                                    </tr>
                                                </thead>
                                                <?php
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo'
                                                    <tr>
                                                        <td>'.$row["no"].'</td>
                                                        <td>'.$row["magazine_title"].'</td>
                                                        <td>'.$row["magazine_publisher"].'</td>
                                                        <td>'.$row["author"].'</td>
                                                        <td>'.$row["no_copies"].'</td>
                                                        <td>'.$row["month"].'</td>
                                                        <td>'.$row["year"].'</td>
                                                        <td>'.$row["remarks"].'</td>
                                                        
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

<script>
$(document).ready(function(){
    $('.edit_btn').on('click', function(){
        $('#edit').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);
        $('#no_magazine').val(data[0]);
        $('#magazine_title').val(data[1]);
        $('#magazine_publisher').val(data[2]);
        $('#author').val(data[3]);
        $('#no_copies').val(data[4]);
        $('#month').val(data[5]);
        $('#year').val(data[6]);
        $('#remarks').val(data[7]);
    });
});

</script> 
<?php include ('includes/footer.php');?>

   
