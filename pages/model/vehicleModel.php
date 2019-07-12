<?php

require 'dbhelper/dbhelper.php';

Class Vehicle extends DBHelper{
    private $table = 'vehicle';
    private $table2 = 'driver';
    private $table3 = 'license';
    private $fields = array(
        'vehicle_plateNo',
        'vehicle_brand',
        'vehicle_color',
        'vehicle_lastRegisteredDate',
        'vehicle_expiryDate',
        'vehicle_status',
        'vehicle_type'
    );

    private $driver = array(
        'license_id',
        'driver_pincode',
        'driver_img',
        'driver_lname',
        'driver_fname',
        'driver_mi',
        'driver_gender',
        'driver_birthdate',
        'driver_addressProv',
        'driver_addressCity',
        'driver_mobile',
        'driver_tel',
        'driver_type',
        'driver_email',
        'driver_password',
        'driver_status'
    );

    private $license = array(
        'license_id',
        'license_type',
        'license_restriction',
        'license_issue_date',
        'license_exp_date',
        'license_nationality',
        'license_status'
    );
    
    function __construct(){
        return DBHelper::__construct();
    }

	/* function getUsers($id){
        return DBHelper::getAll($id); 
     } */
     function getVehicle(){
         return DBHelper::getAll($this->table);
     }
     

     function getVehicled($ref_id){
         return DBHelper::getOne($this->table,'vehicle_plateNo',$ref_id);
     }

    /*
     function getProds($table,$ref_id){
         return DBHelper::getById(array($table,$this->table.'p'),'p.prod_id',$ref_id);
     }
     */
     function addVehicle($data){
         return DBHelper::addRecord($data,$this->fields,$this->table); 
     }

     function addDriver($data){
        return DBHelper::addRecord($data,$this->driver,$this->table2);
    }

    function addLicense($data){
        return DBHelper::addRecord($data,$this->license,$this->table3); 
    }
 
      function updateVehicle($data){
         return DBHelper::updateRecord($data,$this->fields,$this->table,'vehicle_plateNo'); 
      }
 
      function deleteVehicle($ref_id){
          return DBHelper::deleteRecord($this->table,'vehicle_plateNo',$ref_id);
      }

      function stats($status,$id){
          return DBHelper::licenseStatus($status,$id);
      }

      function agencyLogin($username,$password){
          return DBHelper::login($this->table,$username,$password);
      }
}