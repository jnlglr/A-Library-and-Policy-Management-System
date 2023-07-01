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

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php include ('includes/topbar.php');?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-900">Magazines</h1>
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
                                    <th>Publisher</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Number of Copies</th>
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
                                <td>'.$row["magazine_publisher"].'</td>
                                <td>'.$row["magazine_title"].'</td>
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
    });
</script> 
<?php include ('includes/footer.php');?>