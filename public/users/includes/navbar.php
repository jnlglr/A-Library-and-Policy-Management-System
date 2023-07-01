<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    <hr class="sidebar-divider">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../public/users/user-home.php">
        <div class="sidebar-brand-icon">
            <img src="../../images/logo.png" alt="logo" width="50" height="50"> 
        </div>
        <div class="sidebar-brand-text mx-2">Library and Policy Management System</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Navigation
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="../../public/users/user-home.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
    </li>

    <!-- Library -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#libraryCollapse" aria-expanded="true"
            aria-controls="libraryCollapse">
            <i class="fas fa-fw fa-book"></i>
            <span>Library Department</span>
        </a>
        <div id="libraryCollapse" class="collapse" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header text-gray-800">Option:</h6>
                <a class="collapse-item active" href="../../public/users/view-books.php">Book</a>
                <a class="collapse-item active" href="../../public/users/reserve-book.php">Reserve a Book</a>
                <a class="collapse-item active" href="../../public/users/view-cd.php">CD</a>
                <a class="collapse-item active" href="../../public/users/view-documents.php">Document</a>
                <a class="collapse-item active" href="../../public/users/view-journals.php">Journal</a>
                <a class="collapse-item active" href="../../public/users/view-magazines.php">Magazine</a>
                <a class="collapse-item active" href="../../public/users/view-thesis.php">Thesis</a>
            </div>  
        </div>
    </li>

    <!-- Research -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#researchCollapse" aria-expanded="true"
            aria-controls="researchCollapse">
            <i class="fas fa-fw fa-landmark"></i>
            <span>Policy Papers and Research Papers Department</span>
        </a>
        <div id="researchCollapse" class="collapse" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header text-gray-800">Option:</h6>
                <a class="collapse-item active" href="../../public/users/view-policies.php">Policy</a>
                <a class="collapse-item active" href="../../public/users/view-bills.php">Senate and House Bill</a>
            </div>  
        </div>
    </li>
<!-- Nav Item - my-reservation -->
    <li class="nav-item active">
        <a class="nav-link" href="../../public/users/my-reservation.php">
            <i class="fas fa-fw fa-book"></i>
            <span>My Book Reservations</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="submit" name="logout" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../../sign-up_login.php?logout='1'">Logout</a>
                
            </div>
        </div>
    </div>
</div>

      