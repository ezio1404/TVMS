<?php
    include_once 'model/vehicleModel.php';
    $vehicle = new Vehicle();
    if(isset($_SESSION['id']) && isset($_SESSION['head'])){
        if(isset($_POST['add'])){
            $plate = $_POST['plate'];
            $brand = $_POST['brand'];
            $color = $_POST['color'];
            $register = $_POST['register'];
            $expire = $_POST['expire'];
            $status = $_POST['status'];
            $type = $_POST['type'];
            $vehicle->addVehicle(array($plate,$brand,$color,$register,$expire,$status,$type));
        }

        if(isset($_POST['edit'])){
            $plate = $_POST['plate'];
            $brand = $_POST['brand'];
            $color = $_POST['color'];
            $register = $_POST['register'];
            $expire = $_POST['expire'];
            $status = $_POST['status'];
            $type = $_POST['type'];
            $vehicle->updateVehicle(array($plate,$brand,$color,$register,$expire,$status,$type,$plate));
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
                        <h1 class="page-header">Vehicle</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


                <div class="panel-body">
                        <p>
                            <button type="button" class="btn btn-outline btn-info"  data-toggle="modal" data-target="#licenseModal">Add Vehicle</button>
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
                            <input type="text" name="plate" class="form-control" placeholder="Plate Number" required autofocus><br>
                            <input type="text" name="brand" class="form-control" placeholder="Brand" required autofocus><br>
                            <input type="text" name="color" class="form-control" placeholder="Color" required autofocus><br>
                            <p>Last Registered Date</p>
                            <input type="date" name="register" class="form-control" required autofocus><br>
                            <p>Expiry Date</p>
                            <input type="date" name="expire" class="form-control" required autofocus><br>
                            <input type="text" name="status" class="form-control" placeholder="Status" required autofocus><br>
                            <input type="text" name="type" class="form-control" placeholder="Type" required autofocus><br>
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
                                        <th>Plate No.</th>
                                        <th>Date Registered</th>
                                        <th>Expiration Date</th>
                                        <th>Record Status</th>
                                        <th>Brand</th>
                                        <th>Color</th>
                                        <th>Vehicle Type</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $data = $vehicle->getVehicle();
                                    foreach($data as $datas){
                                ?>
                                    <tr>
                                        <td><?php echo $datas['vehicle_plateNo'] ?></td>
                                        <td><?php echo $datas['vehicle_lastRegisteredDate'] ?></td>
                                        <td><?php echo $datas['vehicle_expiryDate'] ?></td>
                                        <td><?php echo $datas['vehicle_status'] ?></td>
                                        <td><?php echo $datas['vehicle_brand'] ?></td>
                                        <td><?php echo $datas['vehicle_color'] ?></td>
                                        <td><?php echo $datas['vehicle_type'] ?></td>
                                        <td> 
                                            <a href="#edit<?php echo $datas['vehicle_plateNo'] ?>" data-toggle="modal"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" style="text-decoration:none" ></i></button>
                                            <a onclick='javascript:confirmation($(this));return false;' href="deleteLicense.php?id=<?php echo $datas['vehicle_plateNo'] ?>" style="text-decoration:none" > <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> </a> 
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
                $data = $vehicle->getVehicle();
                foreach($data as $datas){
            ?>
            <div class="modal fade" id="edit<?php echo $datas['vehicle_plateNo'] ?>" tabindex="-1" role="dialog" aria-labelledby="enforcerModalLabel" aria-hidden="true">
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
                            <p>Plate Number</p>
                            <input type="text" name="plate" class="form-control" value="<?php echo $datas['vehicle_plateNo'] ?>"  autofocus><br>
                            <p>Brand</p>
                            <input type="text" name="brand" class="form-control" value="<?php echo $datas['vehicle_brand'] ?>"  autofocus><br>
                            <p>Color</p>
                            <input type="text" name="color" class="form-control" value="<?php echo $datas['vehicle_color'] ?>"  autofocus><br>
                            <p>Last Registered Date</p>
                            <input type="date" name="register" class="form-control" value="<?php echo $datas['vehicle_lastRegisteredDate'] ?>"  autofocus><br>
                            <p>Expiry Date</p>
                            <input type="date" name="expire" class="form-control" value="<?php echo $datas['vehicle_expiryDate'] ?>" autofocus><br>
                            <p>Status</p>
                            <input type="text" name="status" class="form-control" value="<?php echo $datas['vehicle_status'] ?>"  autofocus><br>
                            <p>Type</p>
                            <input type="text" name="type" class="form-control" value="<?php echo $datas['vehicle_type'] ?>"  autofocus><br>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="edit" class="btn btn-primary" value="Update">
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                
                <!-- endmodal -->
                <?php } ?>
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
