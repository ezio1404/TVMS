<?php
    require_once 'model/enforcerModel.php';
    $enforcer = new Enforcer();
    if(isset($_SESSION['id']) && isset($_SESSION['head'])){
        if(isset($_POST['add'])){
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
            $mi = $_POST['mi'];
            $addressP = $_POST['addressP'];
            $addressC = $_POST['addressC'];
            $mobile = $_POST['mobile'];
            $tel = $_POST['tel'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $password = '';
            $status = 'Active';
            $type = $_POST['type'];
            $date = $_POST['bday'];
            $id = $_SESSION['id'];
            $ok=$enforcer->addEnforcer(array($lname,$fname,$mi,$addressP,$addressC,$mobile,$tel,$gender,$email,$password,$status,$type,$date,$id));
            if($ok){
                echo "<script> alert('Success Adding'); </script>";         
            }else{
                echo "<script> alert('Failed Adding'); </script>";
            }
        }
        if(isset($_POST['edit'])){
            $lnamee = $_POST['lnamee'];
            $fnamee = $_POST['fnamee'];
            $mie = $_POST['mie'];
            $addressPe = $_POST['addressPe'];
            $addressCe = $_POST['addressCe'];
            $mobilee = $_POST['mobilee'];
            $tele = $_POST['tele'];
            $gendere = $_POST['gendere'];
            $emaile = $_POST['emaile'];
            $password = $_POST['password'];
            $statuse = $_POST['statuse'];
            $typee = $_POST['typee'];
            $datee = $_POST['bdaye'];
            $id = $_POST['id'];
            $ok=$enforcer->updateEnforcer(array($lnamee,$fnamee,$mie,$addressPe,$addressCe,$mobilee,$tele,$gendere,$emaile,$password,$statuse,$typee,$datee,$_SESSION['id'],$id));
            if(!$ok){
                echo "<script> alert('Success Updating'); </script>";         
            }else{
                echo "<script> alert('Failed Updating'); </script>";
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
                        <h1 class="page-header">Enforcer</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    
                </div>
                <!-- /.row -->
                <div class="panel-body">
                    <p>
                        <button type="button" class="btn btn-outline btn-info"  data-toggle="modal" data-target="#enforcerModal">Add Enforcer</button>
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
                        <h5 class="modal-title" id="enforcerModalLabel">Add Enforcer</h5>
                        </div>
                        <div class="modal-body">
                        <form method = 'POST'>
                            <input type="text" name="fname" class="form-control" placeholder="Firstname" require autofocus><br>
                            <input type="text" name="lname" class="form-control" placeholder="Lastname" require autofocus><br>
                            <input type="text" name="mi" class="form-control" placeholder="Middle Initial" require autofocus><br>
                            <input type="text" name="addressP" class="form-control" placeholder="Provincial Address" require autofocus><br>
                            <input type="text" name="addressC" class="form-control" placeholder="City Address" require autofocus><br>
                            <input type="number" name="mobile" class="form-control" placeholder="Mobile No." require autofocus><br>
                            <input type="number" name="tel" class="form-control" placeholder="Telephone No." require autofocus><br>
                            <p>Gender</p>
                            <input type="radio" checked="true" name="gender" class="text-center" value="Male" require autofocus>&nbsp&nbsp Male &nbsp&nbsp&nbsp
                            <input type="radio" name="gender" class="text-center" value="Female" require autofocus>&nbsp&nbsp Female<br><br>
                            <input type="email" name="email" class="form-control" placeholder="Email" require autofocus><br>
                            <!-- <input type="password" name="password" class="form-control" placeholder="Password" require autofocus><br> --> 
                            <select name="type" class="form-control" placeholder="Type" require autofocus>
                                <option value='null' disabled selected>Type</option>
                                <option value='Traffic' >Traffic</option>
                                <option value='Parking' >Parking</option>
                            </select><br>
                            <p>Birthdate</p>
                            <input type="date" name="bday" class="form-control" require autofocus><br>
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
                                    <th>Enforcer ID</th>
                                    <th>Name</th>
                                    <th>Bday</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $id = $_SESSION['id'];
                                $data = $enforcer->getEnforcers($id);
                                foreach($data as $datas){
                            ?>
                                <tr>
                                    <td><?php echo $datas['enforcer_id'] ?></td>
                                    <td><?php echo $datas['enforcer_fname'].' '.$datas['enforcer_mi'].'. '. $datas['enforcer_lname'] ?></td>
                                    <td><?php echo $datas['enforcer_birthdate'] ?></td>
                                    <td><?php echo $datas['enforcer_status'] ?></td>
                                    <td> 
                                        <a href="#view<?php echo $datas['enforcer_id'] ?>" data-toggle="modal" style="text-decoration:none"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></button>
                                        <a href="#edit<?php echo $datas['enforcer_id'] ?>" data-toggle="modal" style="text-decoration:none"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></button>
                                        <a onclick='javascript:confirmation($(this));return false;' href="deleteEnforcer.php?id=<?php echo $datas['enforcer_id'] ?>" style="text-decoration:none"> <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> </a> 
                                        <?php if($datas['enforcer_status'] == 'Active'){ ?>
                                        <a onclick='javascript:status($(this));return false;' href="enforcerStatus.php?status=<?php echo $datas['enforcer_status']?>&id=<?php echo $datas['enforcer_id'] ?>"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></a> 
                                        <?php }
                                              else{
                                        ?>
                                        <a onclick='javascript:status($(this));return false;' href="enforcerStatus.php?status=<?php echo $datas['enforcer_status']?>&id=<?php echo $datas['enforcer_id'] ?>"><i class="fa fa-unlock fa-lg" aria-hidden="true"></i></a> 
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
                $data = $enforcer->getEnforcers($_SESSION['id']);
                foreach($data as $datas){
            ?>
            <div class="modal fade" id="edit<?php echo $datas['enforcer_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="enforcerModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="enforcerModalLabel">Edit Enforcer</h5>
                        </div>
                        <div class="modal-body">
                        <form method = 'POST'>
                            <input type="hidden" name="id" class="form-control"  value="<?php echo $datas['enforcer_id'] ?>" require autofocus><br>
                            <input type="text" name="fnamee" class="form-control"  value="<?php echo $datas['enforcer_fname'] ?>" require autofocus><br>
                            <input type="text" name="lnamee" class="form-control" value="<?php echo $datas['enforcer_lname'] ?>" require autofocus><br>
                            <input type="text" name="mie" class="form-control" value="<?php echo $datas['enforcer_mi'] ?>" require autofocus><br>
                            <input type="text" name="addressPe" class="form-control" value="<?php echo $datas['enforcer_addressProv'] ?>" require autofocus><br>
                            <input type="text" name="addressCe" class="form-control" value="<?php echo $datas['enforcer_addressCity'] ?>" require autofocus><br>
                            <input type="number" name="mobilee" class="form-control" value="<?php echo $datas['enforcer_mobile'] ?>" require autofocus><br>
                            <input type="number" name="tele" class="form-control" value="<?php echo $datas['enforcer_tel'] ?>" require autofocus><br>
                            <p>Gender</p>
                            <input type="radio" name="gendere" class="text-center" value="Male" <?php echo ($datas['enforcer_gender'] == 'Male')?'checked':'' ?> require autofocus>&nbsp&nbsp Male &nbsp&nbsp&nbsp
                            <input type="radio" name="gendere" class="text-center" value="Female" <?php echo ($datas['enforcer_gender'] == 'Female')?'checked':'' ?> require autofocus>&nbsp&nbsp Female<br><br>
                            <input type="email" name="emaile" class="form-control" value="<?php echo $datas['enforcer_email'] ?>" require autofocus>
                            <input type="hidden" name="password" class="form-control" value="<?php echo $datas['enforcer_password'] ?>" require autofocus><br>
                            <input type="hidden" name="statuse" class="form-control" value="<?php echo $datas['enforcer_status'] ?>" require autofocus><br>
                            <select name="typee" class="form-control" require autofocus>
                                <option value="<?php echo $datas['enforcer_type'] ?>" selected><?php echo $datas['enforcer_type'] ?></option>
                                <?php
                                    if($datas['enforcer_type'] == 'Parking'){
                                ?>
                                <option value='Traffic' >Traffic</option>
                                <?php
                                    }
                                    else{
                                ?>
                                <option value='Parking' >Parking</option>
                                    <?php } ?>
                            </select><br>
                            <p>Birthdate</p>
                            <input type="date" name="bdaye" class="form-control" value="<?php echo $datas['enforcer_birthdate'] ?>" require autofocus><br>
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
                <!-- Modal -->
            <div class="modal fade" id="view<?php echo $datas['enforcer_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="enforcerModalLabel" aria-hidden="true">
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
                            <p>ID: <?php echo $datas['enforcer_id'] ?></p><br>
                            <p>Name: <?php echo $datas['enforcer_fname'].' '.$datas['enforcer_mi'].'. '.$datas['enforcer_lname']?></p><br>
                            <p>Provincial Address: <?php echo $datas['enforcer_addressProv'] ?></p><br>
                            <p>City Address: <?php echo $datas['enforcer_addressCity'] ?></p><br>
                            <p>Mobile No. : <?php echo $datas['enforcer_mobile'] ?></p><br>
                            <p>Tel No. : <?php echo $datas['enforcer_tel'] ?></p><br>
                            <p>Gender: <?php echo $datas['enforcer_gender'] ?></p><br>
                            <p>Email: <?php echo $datas['enforcer_email'] ?></p><br>
                            <p>Status: <?php echo $datas['enforcer_status'] ?></p><br>
                            <p>Type: <?php echo $datas['enforcer_type'] ?></p><br>
                            <p>Birthdate: <?php echo $datas['enforcer_birthdate'] ?></p><br>
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
