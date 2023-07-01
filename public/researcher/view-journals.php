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


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            <!-- TopBar -->
            <?php include ('includes/topbar.php');?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-900">Journals</h1>
                        
                        </h1>
                    </div>
                    </div>
                    <?php 
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $query = "SELECT * FROM `journal` ORDER BY title";
                        $result = mysqli_query($db, $query);
                    ?>
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                           
                            <p class="mb-4 text-gray-60">This catalog shows the list of journals in the National Youth Commission Library.</p>
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="h5 m-0 font-weight-bold text-primary">Journal Catalog</h6>
                                    </div>
                                        
                                    <div class="card-body shadow">
                                        <div class="table-responsive">
                                            <table id="data" class="table table-hover" id="dataTable" width="100%">
                                                <thead class="thead-light">
                                                    <tr>
                                                    <th>Accession No.</th>
                                                        <th>Thesis Title</th>
                                                        <th>Author</th>
                                                        <th>Call No</th>
                                                        <th>Number of copies</th>
                                                        <th>Copyright Year</th>
                                                        <!-- <th>Type of Bill</th> -->
                                                        
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
        $('#no_journal').val(data[0]);
        $('#title').val(data[1]);
        $('#accession_no').val(data[2]);
        $('#author').val(data[3]);
        $('#call_no').val(data[4]);
        $('#no_copies').val(data[5]);
        $('#copyright_year').val(data[6]);
    });
});

</script> 
<?php include ('includes/footer.php');?>

