<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <hr class="sidebar-divider my-0">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center my-3" href="librarian-home.php">
        <div class="sidebar-brand-icon">
            <img src="images/logo.png" alt="logo" width="50" height="50"> 
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
        <a class="nav-link" href="../../../../nyclibrary/public/librarian/librarian-home.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Librarian Dashboard</span></a>
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
                <a class="collapse-item active" href="../../public/librarian/view-books.php">Book</a>
                <a class="collapse-item active" href="../../public/librarian/reserve-book.php">Reserve a Book</a>
                <a class="collapse-item active" href="../../public/librarian/view-cd.php">CD</a>
                <a class="collapse-item active" href="../../public/librarian/view-documents.php">Document</a>
                <a class="collapse-item active" href="../../public/librarian/view-journals.php">Journal</a>
                <a class="collapse-item active" href="../../public/librarian/view-magazines.php">Magazine</a>
                <a class="collapse-item active" href="../../public/librarian/view-thesis.php">Thesis</a>
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
                <a class="collapse-item active" href="../../public/librarian/view-policies.php">Policy Papers</a>
                <a class="collapse-item active" href="../../public/librarian/view-bills.php">Senate and House Bill</a>
            </div>  
        </div>
    </li>

    <!-- Nav Item - my-reservation -->
    <li class="nav-item active">
        <a class="nav-link" href="../../public/librarian/my-reservation.php">
            <i class="fas fa-fw fa-book"></i>
            <span>My Book Reservations</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Archive -->
        <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#archiveCollapse" aria-expanded="true"
            aria-controls="archiveCollapse">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Archived</span>
        </a>
        <div id="archiveCollapse" class="collapse" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header text-gray-800">Option:</h6>
                <a class="collapse-item active" href="../../public/librarian/archive-books.php">Book</a>
                <a class="collapse-item active" href="../../public/librarian/archive-cds.php">CD</a>
                <a class="collapse-item active" href="../../public/librarian/archive-documents.php">Document</a>
                <a class="collapse-item active" href="../../public/librarian/archive-journals.php">Journal</a>
                <a class="collapse-item active" href="../../public/librarian/archive-magazines.php">Magazine</a>
                <a class="collapse-item active" href="../../public/librarian/archive-thesis.php">Thesis</a>
            </div>  
        </div>
    </li>

    <!-- Nav Item - Audit Trail -->
    <li class="nav-item active">
        <a class="nav-link" href="../../public/librarian/audit.php">
            <i class="fas fa-fw fa-calendar-week"></i>
            <span>Audit Logs</span>
        </a>
    </li>

    <!-- Nav Item - Reserved Trail -->
    <li class="nav-item active">
        <a class="nav-link" href="../../public/librarian/view-reservation.php">
            <i class="fas fa-fw fa-bookmark"></i>
            <span>Reservation</span>
        </a>
    </li>

    <!-- Nav Item - Returned Trail -->
    <li class="nav-item active">
        <a class="nav-link" href="../../public/librarian/view-returned.php">
        <i class="fas fa-fw fa-check"></i>
            <span>Returned</span>
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel
                    </button>
                    <a class="btn btn-primary" href="../../../../nyclibrary/sign-up_login.php?logout='1'">Logout
                    </a>
            </div>
        </div>
    </div>
</div>

      