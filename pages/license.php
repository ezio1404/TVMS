<?php
    include_once 'model/licenseModel.php';
    $license = new License();
    if(isset($_SESSION['id']) && isset($_SESSION['head'])){
        if(isset($_POST['add'])){
            $type = $_POST['type'];
            $res = $_POST['res'];
            $issue = $_POST['issue'];
            $exp = $_POST['exp'];
            $national = $_POST['national'];
            $status = 'Active';
            $id = $_POST['id'];
            $license->addLicense(array($id,$type,$res,$issue,$exp,$national,$status));
            
        }

        if(isset($_POST['edit'])){
            $type = $_POST['type'];
            $res = $_POST['res'];
            $issue = $_POST['issue'];
            $exp = $_POST['exp'];
            $national = $_POST['national'];
            $status = $_POST['status'];
            $id = $_POST['id'];
            $license->updateLicense(array($id,$type,$res,$issue,$exp,$national,$status,$id));
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

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

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
                        <h1 class="page-header">License</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


                <div class="panel-body">
                        <p>
                            <button type="button" class="btn btn-outline btn-info"  data-toggle="modal" data-target="#licenseModal">Add License</button>
                        </p>
                <!-- start modal -->
                <!-- Modal -->
                <div class="modal fade" id="licenseModal" tabindex="-1" role="dialog" aria-labelledby="licenseModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="licenseModalLabel">Add License</h5>
                            </div>
                            <div class="modal-body">
                        <form method = 'POST'>
                            <input type="number" name="id" class="form-control" placeholder="License ID" required autofocus><br>
                            <input type="text" name="type" class="form-control" placeholder="License Type" required autofocus><br>
                            <input type="text" name="res" class="form-control" placeholder="License Restriction" required autofocus><br>
                            <p>Date Issued</p>
                            <input type="date" name="issue" class="form-control" required autofocus><br>
                            <p>Expiration Date</p>
                            <input type="date" name="exp" class="form-control" required autofocus><br>
                            <input type="text" name="national" class="form-control" placeholder="Nationality" required autofocus><br>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="add" class="btn btn-primary" value="Add">
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
                                        <th>License ID</th>
                                        <!-- <th>Owner</th> -->
                                        <th>Type</th>
                                        <th>Restriction</th>
                                        <th>Issue Date</th>
                                        <th>Expiry Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $data = $license->getLicense();
                                    foreach($data as $datas){
                                ?>
                                    <tr>
                                        <td><?php echo $datas['license_id'] ?></td>
                                        <!-- <td><?php //echo $datas['driver_fname'].' '.$datas['driver_mi'].'. '.$datas['driver_lname'] ?></td> -->
                                        <td><?php echo $datas['license_type'] ?></td>
                                        <td><?php echo $datas['license_restriction'] ?></td>
                                        <td><?php echo $datas['license_issue_date'] ?></td>
                                        <td><?php echo $datas['license_exp_date'] ?></td>
                                        <td><?php echo $datas['license_status'] ?></td>
                                        <td> 
                                            <a href="#edit<?php echo $datas['license_id'] ?>" data-toggle="modal"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></button>
                                            <a onclick='javascript:confirmation($(this));return false;' href="deleteLicense.php?id=<?php echo $datas['license_id'] ?>"> <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> </a> 
                                            <?php if($datas['license_status'] == 'Active'){ ?>
                                            <a onclick='javascript:status($(this));return false;' href="licenseStatus.php?status=<?php echo $datas['license_status']?>&id=<?php echo $datas['license_id'] ?>"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></a> 
                                            <?php }
                                                else{
                                            ?>
                                            <a onclick='javascript:status($(this));return false;' href="licenseStatus.php?status=<?php echo $datas['license_status']?>&id=<?php echo $datas['license_id'] ?>"><i class="fa fa-unlock fa-lg" aria-hidden="true"></i></a> 
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.table-responsive panel body -->
                <!-- Modal -->
            <?php
                $data = $license->getLicense();
                foreach($data as $datas){
            ?>
            <div class="modal fade" id="edit<?php echo $datas['license_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="enforcerModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="enforcerModalLabel">Edit License</h5>
                        </div>
                        <div class="modal-body">
                        <form method = 'POST'>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $datas['license_id'] ?>" required autofocus>
                            <input type="hidden" name="status" class="form-control" value="<?php echo $datas['license_status'] ?>" required autofocus>
                            <input type="text" name="type" class="form-control" value="<?php echo $datas['license_type'] ?>" required autofocus><br>
                            <input type="text" name="res" class="form-control" value="<?php echo $datas['license_restriction'] ?>" required autofocus><br>
                            <p>Date Issued</p>
                            <input type="date" name="issue" class="form-control"  value="<?php echo $datas['license_issue_date'] ?>" required autofocus><br>
                            <p>Expiration Date</p>
                            <input type="date" name="exp" class="form-control" value="<?php echo $datas['license_exp_date'] ?>" required autofocus><br>
                            <input type="text" name="national" class="form-control" value="<?php echo $datas['license_nationality'] ?>" required autofocus><br>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="edit" class="btn btn-primary" value="Update">
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
         function status(anchor){
             var conf = confirm("Are you sure you want to update status?");
             if(conf)
                window.location=anchor.attr("href");
         }
     </script>
 


</body>

</html>
