 <!-- Bootstrap core JavaScript-->
 <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/chart-area-demo.js"></script>
    <script src="../../js/demo/chart-pie-demo.js"></script>

   <!-- Page level plugins -->
   <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>

    <!-- Sweet Alert 2 -->
   <script src="../../../js/sweetalert2.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Sweet Alert 
    <script src="../../../js/sweetalert.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->

   <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
      ?>
       <script>
         Swal.fire({
            position: 'top-end',
            // text: "You clicked the button!",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            title: "<?php echo $_SESSION['status']; ?>",
            showConfirmButton: false,
            timer: 1500
         });

       </script>
    <?php 
      unset($_SESSION['status']);
    
    }
   ?>

