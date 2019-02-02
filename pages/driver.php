<?php
    include_once 'model/driverModel.php';
    $driver = new Driver();
    if(isset($_SESSION['id']) && isset($_SESSION['head'])){
      if(isset($_POST['add'])){
        $license = $_POST['license'];
        $pin = $_POST['pincode'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mi = $_POST['mi'];
        $p = $_POST['addressP'];
        $c = $_POST['addressC'];
        $mobile = $_POST['mobile'];
        $tel = $_POST['tel'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = '';
        $type = $_POST['type'];
        $bday = $_POST['bday'];
        $status = 'Active';
        $driver->addDriver(array($license,$pin,$lname,$fname,$mi,$gender,$bday,$p,$c,$mobile,$tel,$type,$email,$password,$status));
      }

      if(isset($_POST['edit'])){
        $license = $_POST['license'];
        $pin = $_POST['pincode'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mi = $_POST['mi'];
        $p = $_POST['addressP'];
        $c = $_POST['addressC'];
        $mobile = $_POST['mobile'];
        $tel = $_POST['tel'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $type = $_POST['type'];
        $bday = $_POST['bday'];
        $status = $_POST['status'];
        $id = $_POST['id'];
        $driver->updateDriver(array($license,$pin,$lname,$fname,$mi,$gender,$bday,$p,$c,$mobile,$tel,$type,$email,$password,$status,$id));
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
                        <h1 class="page-header">Driver</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    
                </div>
                <!-- /.row -->
                <div class="panel-body">
                    <p>
                        <button type="button" class="btn btn-outline btn-info"  data-toggle="modal" data-target="#enforcerModal">Add Driver</button>
                    </p>
                <!-- start modal -->
                <!-- Modal -->
                <div class="modal fade" id="enforcerModal" tabindex="-1" role="dialog" aria-labelledby="enforcerModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="enforcerModalLabel">Add Driver</h5>
                        </div>
                        <div class="modal-body">
                        <form method = 'POST'>
                            <input type="number" name="license" class="form-control" placeholder="License ID" required autofocus><br>
                            <input type="number" name="pincode" class="form-control" placeholder="Driver Pincode" required autofocus><br>
                            <input type="text" name="fname" class="form-control" placeholder="Firstname" required autofocus><br>
                            <input type="text" name="lname" class="form-control" placeholder="Lastname" required autofocus><br>
                            <input type="text" name="mi" class="form-control" placeholder="Middle Initial" required autofocus><br>
                            <input type="text" name="addressP" class="form-control" placeholder="Provincial Address" required autofocus><br>
                            <input type="text" name="addressC" class="form-control" placeholder="City Address" required autofocus><br>
                            <input type="number" name="mobile" class="form-control" placeholder="Mobile No." required autofocus><br>
                            <input type="number" name="tel" class="form-control" placeholder="Telephone No." required autofocus><br>
                            <p>Gender</p>
                            <input type="radio" name="gender" class="text-center" value="Male" required autofocus>&nbsp&nbsp Male &nbsp&nbsp&nbsp
                            <input type="radio" name="gender" class="text-center" value="Female" required autofocus>&nbsp&nbsp Female<br><br>
                            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus><br>
                            <!-- <input type="password" name="password" class="form-control" placeholder="Password" require autofocus><br> --> 
                            <select name="type" class="form-control" placeholder="Type" required autofocus>
                                <option value='' disabled selected>Type</option>
                                <option value='Jeep' >Jeep</option>
                                <option value='Taxi' >Taxi</option>
                                <option value='Taxi' >Bus</option>
                            </select><br>
                            <p>Birthdate</p>
                            <input type="date" name="bday" class="form-control" required autofocus><br>
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
                                    <th>Driver ID</th>
                                    <th>License ID</th>
                                    <th>Pincode</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Mobile No.</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $data = $driver->getDriver();
                                foreach($data as $datas){
                            ?>
                                <tr>
                                    <td><?php echo $datas['driver_id'] ?></td>
                                    <td><?php echo $datas['license_id'] ?></td>
                                    <td><?php echo $datas['driver_pincode'] ?></td>
                                    <td><?php echo $datas['driver_fname'].' '.$datas['driver_mi'].'. '. $datas['driver_lname'] ?></td>
                                    <td><?php echo $datas['driver_gender'] ?></td>
                                    <td><?php echo $datas['driver_mobile'] ?></td>
                                    <td><?php echo $datas['driver_status'] ?></td>
                                    <td> 
                                        <a href="#view<?php echo $datas['driver_id'] ?>" data-toggle="modal" style="text-decoration:none"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                                        <a href="#edit<?php echo $datas['driver_id'] ?>" data-toggle="modal" style="text-decoration:none"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></button>
                                        <a onclick='javascript:confirmation($(this));return false;' style="text-decoration:none" href="deleteDriver.php?id=<?php echo $datas['driver_id'] ?>"> <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> </a> 
                                        <?php if($datas['driver_status'] == 'Active'){ ?>
                                        <a onclick='javascript:status($(this));return false;' href="driverStatus.php?status=<?php echo $datas['driver_status']?>&id=<?php echo $datas['driver_id'] ?>"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></a> 
                                        <?php }
                                              else{
                                        ?>
                                        <a onclick='javascript:status($(this));return false;' href="driverStatus.php?status=<?php echo $datas['driver_status']?>&id=<?php echo $datas['driver_id'] ?>"><i class="fa fa-unlock fa-lg" aria-hidden="true"></i></a> 
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>   
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.table-responsive panel body -->
            <!-- Modal -->
            <?php
                $data = $driver->getDriver();
                foreach($data as $datas){
            ?>
            <div class="modal fade" id="edit<?php echo $datas['driver_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="enforcerModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="enforcerModalLabel">Edit Driver</h5>
                        </div>
                        <div class="modal-body">
                        <form method = 'POST'>
                            <input type="hidden" name="id" class="form-control"  value="<?php echo $datas['driver_id'] ?>" require autofocus><br>
                            <input type="number" name="license" class="form-control" value="<?php echo $datas['license_id'] ?>" required autofocus><br>
                            <input type="number" name="pincode" class="form-control" value="<?php echo $datas['driver_pincode'] ?>" required autofocus><br>
                            <input type="text" name="fname" class="form-control" value="<?php echo $datas['driver_fname'] ?>" required autofocus><br>
                            <input type="text" name="lname" class="form-control" value="<?php echo $datas['driver_lname'] ?>" required autofocus><br>
                            <input type="text" name="mi" class="form-control" value="<?php echo $datas['driver_mi'] ?>" required autofocus><br>
                            <input type="text" name="addressP" class="form-control" value="<?php echo $datas['driver_addressProv'] ?>" required autofocus><br>
                            <input type="text" name="addressC" class="form-control" value="<?php echo $datas['driver_addressCity'] ?>"placeholder="City Address" required autofocus><br>
                            <input type="number" name="mobile" class="form-control" value="<?php echo $datas['driver_mobile'] ?>" required autofocus><br>
                            <input type="number" name="tel" class="form-control" value="<?php echo $datas['driver_tel'] ?>" required autofocus><br>
                            <p>Gender</p>
                            <input type="radio" name="gender" class="text-center" value="Male" <?php echo ($datas['driver_gender'] == 'Male')?'checked':'' ?> required autofocus>&nbsp&nbsp Male &nbsp&nbsp&nbsp
                            <input type="radio" name="gender" class="text-center" value="Female" <?php echo ($datas['driver_gender'] == 'Female')?'checked':'' ?> required autofocus>&nbsp&nbsp Female<br><br>
                            <input type="email" name="email" class="form-control" value="<?php echo $datas['driver_email'] ?>" required autofocus><br>
                            <input type="hidden" name="password" class="form-control" value="<?php echo $datas['driver_password'] ?>" require autofocus>
                            <input type="hidden" name="status" class="form-control" value="<?php echo $datas['driver_status'] ?>" require autofocus>
                            <select name="type" class="form-control" required autofocus>
                                <option value="<?php echo $datas['driver_type'] ?>" selected><?php echo $datas['driver_type'] ?></option>
                                <?php
                                    if($datas['driver_type'] == 'Jeep'){
                                ?>
                                <option value='Taxi' >Taxi</option>
                                <option value='Bus' >Bus</option>
                                <?php
                                    }else if($data['driver_type'] == 'Taxi'){
                                ?>
                                <option value='Jeep' >Jeep</option>
                                <option value='Bus' >Bus</option>
                                <?php
                                    }else{
                                ?>
                                <option value='Jeep' >Jeep</option>
                                <option value='Taxi' >Taxi</option>
                                <?php
                                    }
                                ?>
                            </select><br>
                            <p>Birthdate</p>
                            <input type="date" name="bday" class="form-control" value="<?php echo $datas['driver_birthdate'] ?>" required autofocus><br>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="edit" class="btn btn-primary" value="Update">
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="modal fade" id="view<?php echo $datas['driver_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="enforcerModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width:50%">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="enforcerModalLabel">View Enforcer</h5>
                        </div>
                        <div class="modal-body">
                        <form method = 'POST'>
                            <p>ID: <?php echo $datas['driver_id'] ?></p><br>
                            <p>Name: <?php echo $datas['driver_fname'].' '.$datas['driver_mi'].'. '.$datas['driver_lname']?></p><br>
                            <p>Provincial Address: <?php echo $datas['driver_addressProv'] ?></p><br>
                            <p>City Address: <?php echo $datas['driver_addressCity'] ?></p><br>
                            <p>Mobile No. : <?php echo $datas['driver_mobile'] ?></p><br>
                            <p>Tel No. : <?php echo $datas['driver_tel'] ?></p><br>
                            <p>Gender: <?php echo $datas['driver_gender'] ?></p><br>
                            <p>Email: <?php echo $datas['driver_email'] ?></p><br>
                            <p>Status: <?php echo $datas['driver_status'] ?></p><br>
                            <p>Type: <?php echo $datas['driver_type'] ?></p><br>
                            <p>Birthdate: <?php echo $datas['driver_birthdate'] ?></p><br>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
