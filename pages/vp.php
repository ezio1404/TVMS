<?php
    include_once 'model/vpModel.php';
    $violation = new Violation();
    if(isset($_SESSION['id']) && isset($_SESSION['head'])){
        
        if(isset($_POST['add'])){
            $vcode = $_POST['vcode'];
            $vname = $_POST['vname'];
            $vdesc = $_POST['vdesc'];
            $vpenalty = $_POST['vpenalty'];
        
            $ok=$violation->addViolation(array($vcode,$vname,$vdesc,$vpenalty,$_SESSION['id']));
            if(!$ok){
                echo "<script> alert('Success'); </script>";    
            }
        }

        if(isset($_POST['edit'])){
            $vid = $_POST['vid'];
            $vcodee = $_POST['vcodee'];
            $vnamee = $_POST['vnamee'];
            $vdesce = $_POST['vdesce'];
            $vpenaltye = $_POST['vpenaltye'];
            $ok=$violation->updateViolation(array($vcodee,$vnamee,$vdesce,$vpenaltye,$_SESSION['id'],$vid));
            if(!$ok){
                echo "<script> alert('Success'); </script>";    
            }
        }
        
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
                        <h1 class="page-header">Violations And Penalties</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


                <div class="panel-body">
                        <p>
                            <button type="button" class="btn btn-outline btn-info"  data-toggle="modal" data-target="#vpModal">Add Violation and Penalty</button>
                        </p>
                <!-- start modal -->
                <!-- Modal -->
                <div class="modal fade" id="vpModal" tabindex="-1" role="dialog" aria-labelledby="vpModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="vpModalLabel">Add Violation and Penalty</h5>
                            </div>
                            <div class="modal-body">
                            <form method="POST">
                                <input type="text" name="vcode" class="form-control" placeholder="Violation Code" require autofocus><br>
                                <input type="text" name="vname" class="form-control" placeholder="Violation Name" require autofocus><br>
                                <input type="text" name="vdesc" class="form-control" placeholder="Violation Description" require autofocus><br>
                                <input type="number" name="vpenalty" class="form-control" placeholder="Violation Penalty" require autofocus><br>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="add" class="btn btn-primary">Add</button>
                            </div>
                            </form>
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
                                        <th>Ordinance No.</th>
                                        <th>Article No.</th>
                                        <th>Description</th>
                                        <th>Penalty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $data = $violation->getViolations();
                                    foreach($data as $datas){
                                ?>
                                    <tr>
                                        <td><?php echo $datas['ordinanceNo'] ?></td>
                                        <td><?php echo $datas['articleNo'] ?></td>
                                        <td><?php echo $datas['violation_desc'] ?></td>
                                        <td><?php echo $datas['violation_penalty'] ?></td>
                                        <td> 
                                            <a href="#edit<?php echo $datas['violation_id'] ?>" data-toggle="modal"> <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> </a> 
                                            <a onclick='javascript:confirmation($(this));return false;' href="deleteViolation.php?id=<?php echo $datas['violation_id'] ?>"> <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> </a> 
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- Modal -->
                    <?php
                        $data = $violation->getViolations();
                        foreach($data as $datas){
                    ?>
                <div class="modal fade" id="edit<?php echo $datas['violation_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="vpModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="vpModalLabel">Edit Violation and Penalty</h5>
                            </div>
                            <div class="modal-body">
                            <form method="POST">
                                <input type="hidden" name="vid" class="form-control" value="<?php echo $datas['violation_id'] ?>" autofocus><br>
                                <input type="text" name="vcodee" class="form-control" value="<?php echo $datas['ordinanceNo'] ?>" autofocus><br>
                                <input type="text" name="vnamee" class="form-control" value="<?php echo $datas['articleNo'] ?>" autofocus><br>
                                <input type="text" name="vdesce" class="form-control" value="<?php echo $datas['violation_desc'] ?>" autofocus><br>
                                <input type="number" name="vpenaltye" class="form-control" value="<?php echo $datas['violation_penalty'] ?>" autofocus><br>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="edit" class="btn btn-primary">Update</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                        <?php } ?>
                    <!-- endmodal -->

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
         function confirmation(anchor){
             var conf = confirm("Are you sure you want to delete this?");
             if(conf)
                window.location=anchor.attr("href");
         }
     </script>
 


</body>

</html>
