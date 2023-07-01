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


<!-- Add Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
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
            <label>Accession No.</label>
            <input type="text"  class="form-control risen shadow" name="accession_no" aria-describedby="" placeholder="" required>
        </div>
        <div class="modal-body">
            <label>Title</label>
            <input type="text"  class="form-control risen shadow" name="title" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Author</label>
            <input type="text" class="form-control risen shadow" name="author" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Call No.</label>
            <input type="text" class="form-control risen shadow" name="call_no" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">No. of copies</label>
            <input type="text" class="form-control risen shadow" name="no_copies" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Copyright Year</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="copyright_year" placeholder="YYYY" required>
        </div>

        <div class="modal-body">
            <label for="">Remarks</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="remarks" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Category</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="category" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">ISBN</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="isbn" placeholder="" required>
        </div>

        <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="add_book_admin">Add Book</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../../../nyclibrary/function/function.php"  method="post">
      <input type="hidden" name="no_book" id="no_book">
        <div class="modal-body">
            <label for="">Title</label>
            <input type="text"  class="form-control risen shadow" name="title" id="title" aria-describedby="" placeholder="" required>
        </div>

        <div class="modal-body">
            <label for="">Accession No.</label>
            <input type="text" class="form-control risen shadow" name="accession_no" id="accession_no" aria-describedby="" placeholder="">
        </div>

        <div class="modal-body">
            <label for="">Author</label>
            <input type="text" class="form-control risen shadow" name="author" id="author" aria-describedby="" placeholder="">
        </div>

        <div class="modal-body">
            <label for="">Call No.</label>
            <input type="text" class="form-control risen shadow" name="call_no" id="call_no" aria-describedby="" placeholder="">
        </div>

        <div class="modal-body">
            <label for="">No of copies</label>
            <input type="text" class="form-control risen shadow" name="no_copies" id="no_copies" aria-describedby="" placeholder="">
        </div>

        <div class="modal-body">
            <label for="">Copyright Year</label>
            <input type="text" class="form-control risen shadow" aria-describedby="" name="copyright_year" id="copyright_year" placeholder="YYYY">
        </div>

        <div class="modal-body">
            <label for="">Remarks</label>
            <input type="text" class="form-control risen shadow" name="remarks" id="remarks" aria-describedby="" placeholder="">
        </div>

        <div class="modal-body">
            <label for="">Category</label>
            <input type="text" class="form-control risen shadow" name="category" id="category" aria-describedby="" placeholder="">
        </div>

        <div class="modal-body">
            <label for="">ISBN</label>
            <input type="text" class="form-control risen shadow" name="isbn" id="isbn" aria-describedby="" placeholder="">
        </div>

        <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="edit_book_admin">Update</button>
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
        <!-- TopBar -->
        <?php include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/public/users/includes/topbar.php');?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?php 
            // connect to database
            include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
            $query = "SELECT * FROM `book` ORDER BY title";
            $result = mysqli_query($db, $query);
            ?>
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-900">Books Catalog</h1>
            </div>
        </div>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <p class="mb-4 text-gray-60">This page allows you to add, update, and archive books.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <button class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#add">Click here to add a record</button>
                </div>
                <div class="card-body shadow">
                    <div class="table-responsive">
                        <table id="data" class="table table-hover" id="dataTable" width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Accession No.</th>
                                    <th>Author</th>
                                    <th>Call No.</th>
                                    <th>Number of Copies</th>
                                    <th>Copyright Year</th>
                                    <th>Remarks</th>
                                    <th>Category</th>
                                    <th>ISBN</th>
                                    <th>Librarian Action</th>
                                </tr>
                            </thead>
                            <?php
                            while($row = mysqli_fetch_array($result)):
                                ?>
                                <tr>
                                    <td><?= $row["no_book"];?></td>
                                    <td><?= $row["title"];?></td>
                                    <td><?= $row["accession_no"];?></td>
                                    <td><?= $row["author"];?></td>
                                    <td><?= $row["call_no"];?></td>
                                    <td><?= $row["no_copies"];?></td>
                                    <td><?= $row["copyright_year"];?></td>
                                    <td><?= $row["remarks"];?></td>
                                    <td><?= $row["category"];?></td>
                                    <td><?= $row["isbn"];?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info edit_btn" data-toggle="modal" data-target="#edit"> EDIT </button>
                                        <br>
                                        <br>
                                        <a href="../../../nyclibrary/function/archive-book-admin.php?no_book=<?= $row["no_book"]; ?>" type="button" class="btn btn-outline-warning archive_btn"> Archive </a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
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
            $('#no_book').val(data[0]);
            $('#title').val(data[1]);
            $('#accession_no').val(data[2]);
            $('#author').val(data[3]);
            $('#call_no').val(data[4]);
            $('#no_copies').val(data[5]);
            $('#copyright_year').val(data[6]);
            $('#remarks').val(data[7]);
            $('#category').val(data[8]);
            $('#isbn').val(data[9]);
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
   
