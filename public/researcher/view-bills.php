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

<?php include ('includes/header.php');?>
<?php include ('includes/navbar.php');?>

<!-- Add Modal -->


<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Add Bill</h5>
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
            <label>Bill Number</label>
            <input type="text"  class="form-control risen shadow" name="bill_number" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label>Title</label>
            <input type="text"  class="form-control risen shadow" name="title" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Date Filed</label>
            <input type="text" class="form-control risen shadow" name="date_filed" aria-describedby="" placeholder="YYYY-MM-DD" required>
        </div>

        <div class="modal-body">
            <label for="">Subject</label>
            <input type="text" class="form-control risen shadow" name="subject" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Sponsor</label>
            <input type="text" class="form-control risen shadow" name="sponsor" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Committee In-Charge</label>
            <input type="text" class="form-control risen shadow" name="in_charge" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Updates</label>
            <input type="text" class="form-control risen shadow" name="updates" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Link</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="link" required>
        </div>

        <div class="modal-body">
            <label for="">Center of Participation</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="center_of_participation" id="date_submitted" >
        </div>

            
        <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="add_bill_btn">Add Bill</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Policy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../../../nyclibrary/function/function.php"  method="post">
        
      <input type="hidden" name="senatebill_id" id="senatebill_id">
      <div class="modal-body">
            <label for="">Bill Number</label>
            <input type="text"  class="form-control risen shadow" name="bill_number" id="bill_number" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Bill Title</label>
            <input type="text"  class="form-control risen shadow" name="title" id="title" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Date Filed</label>
            <input type="text" class="form-control risen shadow" name="date_filed" id="date_filed" aria-describedby="" placeholder="YYYY-MM-DD" required>
        </div>

        <div class="modal-body">
            <label for="">Subject</label>
            <input type="text" class="form-control risen shadow" name="subject" id="subject" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Sponsor</label>
            <input type="text" class="form-control risen shadow" name="sponsor" id="sponsor" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Committee In-Charge</label>
            <input type="text" class="form-control risen shadow" name="in_charge" id="in_charge" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Updates</label>
            <input type="text" class="form-control risen shadow" name="updates" id="updates" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Link</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="link" id="link" placeholder="YYYY-MM-DD" required>
        </div>

        <div class="modal-body">
            <label for="">Center of Participation</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="center_of_participation" id="center_of_participation" required>
        </div>

        

        <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="edit_bill">Update</button>
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
                        <h1 class="h3 mb-0 text-gray-900">Senate and House Bills Catalog</h1>
                        
                        </h1>
                    </div>
                    </div>
                    <?php 
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $query = "SELECT * FROM `senatebill` ORDER BY title";
                        $result = mysqli_query($db, $query);
                    ?>
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <!--<h1 class="h5 mb-2 text-gray-700">Policies Table</h1>-->
                            <p class="mb-4 text-gray-60">This section allows you to add, update, and archive bills.</p>
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    <button class="btn btn-outline-primary btn-lg " data-toggle="modal" data-target="#add">Click here to add a record</button>
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
                                                        <th>Researcher Action</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                while($row = mysqli_fetch_array($result)):
                                                
                                                ?>
                                                    <tr>
                                                        <td><?= $row["senatebill_id"];?></td>
                                                        <td><?= $row["bill_number"];?></td>
                                                        <td><?= $row["title"];?></td>
                                                        <td><?= $row["date_filed"];?></td>
                                                        <td><?= $row["subject"];?></td>
                                                        <td><?= $row["sponsor"];?></td>
                                                        <td><?= $row["in_charge"];?></td>
                                                        <td><?= $row["updates"];?></td>
                                                        <td><a a target="_blank" href = "<?= $row["link"];?>"> <?= $row["link"];?> </a></td>
                                                        <td><?= $row["center_of_participation"];?></td>
                                                        <td>
                                                        <button type="button" class="btn btn-outline-info edit_btn" data-toggle="modal" data-target="#edit"> EDIT </button>
                                                        <br>
                                                        <br>
                                                        <a href="../../../nyclibrary/function/archive-bill.php?senatebill_id=<?= $row["senatebill_id"]; ?>" type="button" class="btn btn-outline-warning archive_btn"> Archive </a>
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
        $('#senatebill_id').val(data[0]);
        $('#bill_number').val(data[1]);
        $('#title').val(data[2]);
        $('#date_filed').val(data[3]);
        $('#subject').val(data[4]);
        $('#sponsor').val(data[5]);
        $('#in_charge').val(data[6]);
        $('#updates').val(data[7]);
        $('#link').val(data[8]);
        $('#center_of_participation').val(data[9]);
    });

    $('.archive_btn').on('click', function(e){
        e.preventDefault();
        const href= $(this).attr('href')

        Swal.fire({
        title: 'Are you sure?',
        text: "This data will be saved to the archive table, and will not be viewed by other users!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#00b4db',
        cancelButtonColor: ' #efbf3a',
        confirmButtonText: 'Yes, archive it!'
        }).then((result) => {
        if (result.value) {
            document.location.href = href;
  }
})
    })
});

</script> 
<?php include ('includes/footer.php');?>

    

   
