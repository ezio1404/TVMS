<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

Class DBHelper{
    private $host = "localhost";
    private $db = "tvms";
    private $user = "root";
    private $pass = "";
    private $conn;

    function __construct(){
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->pass);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function getAll($table){
        $sql = "SELECT * FROM $table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    function getById($table,$fields_id,$ref_id){
        // $tables = implode(",",$table);
        $sql = "SELECT * FROM $table WHERE $fields_id = $ref_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    // function getEnforcer($id){
    //     $sql = "SELECT * from enforcer where enforcer_id = ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute(array($id));
    //     $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $row;
    // }

    function getByRelation($table,$fields_id,$ref_id,$data){
        // $tables = implode(",",$table);
        $sql = "SELECT * FROM $table WHERE $fields_id = $ref_id AND $fields_id  = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function getOne($table,$fields_id,$ref_id){
        $sql = "SELECT * FROM $table WHERE $fields_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($ref_id);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function login($table,$username,$password){
        $sql = "SELECT * FROM $table WHERE agency_email = ? AND agency_password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($username,$password));
        $count = $stmt->rowCount();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($count > 0){
            echo "<script> window.location='../pages/dashboard.php'; </script>";
            $_SESSION['id'] = $data['agency_id'];
            $_SESSION['head'] = $data['agency_head'];
        }
        else{
            echo "<script> window.location='../pages/index.php'; </script>";
        }
    }
    
    function updateRecord($data,$fields,$table,$field_id){
        $val = array();
        foreach($fields as $fld)
        $val[] = $fld."=?";
        $values = implode(",",$val);
        $sql = "UPDATE $table SET $values WHERE $field_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    function addRecord($data,$fields,$table){
        $flds = implode(",",$fields);
        $val = array();
        foreach($data as $d)
        $val[] = "?";
        $values = implode(",",$val);
        $sql = "INSERT INTO $table($flds) VALUES($values)";
        $stmt = $this->conn->prepare($sql);
       $ok= $stmt->execute($data);
        
    }

    function deleteRecord($table,$field_id,$ref_id){
        $sql = "DELETE FROM $table WHERE $field_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($ref_id);
    }

    function status($status,$id){
        $sql = "UPDATE enforcer SET enforcer_status = ? WHERE enforcer_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($status,$id));
    }

    function driverStatus($status,$id){
        $sql = "UPDATE driver SET driver_status = ? WHERE driver_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($status,$id));
    }

    function licenseStatus($status,$id){
        $sql = "UPDATE license SET license_status = ? WHERE license_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($status,$id));
    }

    function joinLicense(){
        $sql = "select e.license_id,e.license_type,e.license_restriction,e.license_issue_date,e.license_exp_date,e.license_nationality,e.license_status,c.driver_lname,c.driver_fname,c.driver_mi FROM license e, driver c WHERE e.license_id = c.license_id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function joinVehicle(){
        $sql = "select e.vehicle_plateNo,e.vehicle_reg_date,e.vehicle_regExp_date,e.vehicle_rec_status,e.vehicle_type,c.driver_lname,c.driver_fname,c.driver_mi FROM vehicle e, driver c WHERE e.driver_id = c.driver_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }



}