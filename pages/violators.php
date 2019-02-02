<?php
    include_once 'model/vpModel.php';
    if(isset($_SESSION['id']) && isset($_SESSION['head'])){
        
    }
    else{
        echo "<script> window.location='index.php'; </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TVMS-Traffic Violation And Management System">
    <meta name="author" content="Potot,EJ Anton S.">

    <title>TVMS</title>
    <link rel="icon" href="../dist/images/tvms-1.png"  > 
    
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Datatables CSS-->
    <link rel="stylesheet" href="../dist/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../dist/css/buttons.dataTables.min.css">


</head>

<body>
<?php include_once "nav.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Violators</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->



                <div class="panel-body">
                <!-- start modal -->
                <!-- Modal -->
                <div class="modal fade" id="violatorModal" tabindex="-1" role="dialog" aria-labelledby="violatorModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="violatorModalLabel">Add Violator</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            ...
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- endmodal -->
    
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered" id="example" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Paid</td>
                                        <td> 
                                            <a href="http://"> <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> </a> 
                                            <a href="http://"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></a> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.table-responsive panel body -->
    

                    
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

         <!-- Datatable JavaScript -->
         <script src="../JS/jquery.dataTables.min.js"></script>
         <script src="../JS/dataTables.buttons.min.js"></script>
         <script src="../JS/buttons.print.min.js"></script>
         <script src="../JS/buttons.flash.min.js"></script>
         <script src="../JS/buttons.html5.min.js"></script>
         <script src="../JS/jszip.min.js"></script>
         <script src="../JS/pdfmake.min.js"></script>
         <script src="../JS/vfs_fonts.js"></script>
         <script type="text/javascript">
             $(document).ready(function () {
                 $('#example').DataTable({
                     "pageLength": 20,
                     dom: 'Bfrtip',
                     buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                 });
             });
         </script>
     
    


</body>

</html>
