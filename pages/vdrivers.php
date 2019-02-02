<?php
    include_once 'model/vdriversModel.php';
    $vdrivers = new Vdrivers();
    $driver=$vdrivers->getDriver();
    $vehicle =$vdrivers->getVehicle();
    $okDriver=false;
    $ok2=false;
    
    if(isset($_SESSION['id']) && isset($_SESSION['head'])){
    
            if(isset($_POST['add'])){
                foreach($driver as $d){
                    if($d['driver_id'] == $_POST['driver'])
                        $okDriver=true;
                }
                foreach($vehicle as $v){
                    if($v['vehicle_plateNo'] == $_POST['plate'])
                        $ok2=true;
                }
                if($ok2 && $okDriver){
                $plate = $_POST['plate'];
                $driver = $_POST['driver'];
                $current = Date('Y-m-d');
                $ok=$vdrivers->addVdriver(array($driver,$plate,$current));
                    if($ok){
                        echo "<script> alert('Success Adding'); </script>";         
                    }else{
                        echo "<script> alert('Failed Adding'); </script>";
                    }
            }else{
                echo "<script> alert('Error adding Driver and Vehicle'); </script>";
            }
        }
        

        if(isset($_POST['edit'])){
            $plate = $_POST['plate'];
            $driver = $_POST['driver'];
            $current = Date('Y-m-d');
            $id = $_POST['id'];
            $vdrivers->updateVdriver(array($driver,$plate,$current,$id));
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
                        <h1 class="page-header">Vehicle Drivers</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


                <div class="panel-body">
                        <p>
                            <button type="button" class="btn btn-outline btn-info"  data-toggle="modal" data-target="#licenseModal">Add Vehicle Drivers</button>
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
                            <h5 class="modal-title" id="licenseModalLabel">Add Vehicle Drivers</h5>
                            </div>
                            <div class="modal-body">
                        <form method = 'POST'>
                            <input type="text" name="driver" class="form-control" placeholder="Driver's ID" required autofocus><br>
                            <input type="text" name="plate" class="form-control" placeholder="Plate Number" required autofocus><br>
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
                                        <th>Vehicle Drivers ID</th>
                                        <th>Drivers ID</th>
                                        <th>Plate No.</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $data = $vdrivers->getVdriver();
                                    foreach($data as $datas){
                                ?>
                                    <tr>
                                        <td><?php echo $datas['vehicle_drivers_id'] ?></td>
                                        <td><?php echo $datas['driver_id'] ?></td>
                                        <td><?php echo $datas['vehicle_plateNo'] ?></td>
                                        <td><?php echo $datas['vehicle_drivers_date'] ?></td>
                                        <td> 
                                            <a href="#edit<?php echo $datas['vehicle_drivers_id'] ?>" data-toggle="modal"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" style="text-decoration:none" ></i></button>
                                            <a onclick='javascript:confirmation($(this));return false;' href="deleteV.php?id=<?php echo $datas['vehicle_drivers_id'] ?>" style="text-decoration:none" > <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> </a> 
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
                $data = $vdrivers->getVdriver();
                foreach($data as $datas){
            ?>
            <div class="modal fade" id="edit<?php echo $datas['vehicle_drivers_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="enforcerModalLabel" aria-hidden="true">
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
                            <p>Driver's ID</p>
                            <input type="text" name="driver" class="form-control" value="<?php echo $datas['driver_id'] ?>"  autofocus><br>
                            <p>Plate No.</p>
                            <input type="text" name="plate" class="form-control" value="<?php echo $datas['vehicle_plateNo'] ?>"  autofocus><br>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $datas['vehicle_drivers_id'] ?>"  autofocus><br>
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
