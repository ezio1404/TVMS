<?php

require 'dbhelper/dbhelper.php';

Class Vehicle extends DBHelper{
    private $table = 'vehicle';
    private $fields = array(
        'vehicle_plateNo',
        'vehicle_brand',
        'vehicle_color',
        'vehicle_lastRegisteredDate',
        'vehicle_expiryDate',
        'vehicle_status',
        'vehicle_type'
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
 
      function updateVehicle($data){
         return DBHelper::updateRecord($data,$this->fields,$this->table,'vehicle_plateNo'); 
      }
 
      function deleteLicense($ref_id){
          return DBHelper::deleteRecord($this->table,'license_id',$ref_id);
      }

      function stats($status,$id){
          return DBHelper::licenseStatus($status,$id);
      }

      function agencyLogin($username,$password){
          return DBHelper::login($this->table,$username,$password);
      }
}