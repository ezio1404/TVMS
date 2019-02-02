<?php

require 'dbhelper/dbhelper.php';

Class Vdrivers extends DBHelper{
    private $table = 'vehicle_drivers';
    private $fields = array(
        'driver_id',
        'vehicle_plateNo',
        'vehicle_drivers_date'
    );
    
    function __construct(){
        return DBHelper::__construct();
    }

	/* function getUsers($id){
        return DBHelper::getAll($id); 
     } */
     function getVdriver(){
         return DBHelper::getAll($this->table);
     }
     function getDriver(){
        return DBHelper::getAll('driver');
     }
     function getVehicle(){
        return DBHelper::getAll('vehicle');
     }
     function getVehicled($ref_id){
         return DBHelper::getOne($this->table,'vehicle_plateNo',$ref_id);
     }

    /*
     function getProds($table,$ref_id){
         return DBHelper::getById(array($table,$this->table.'p'),'p.prod_id',$ref_id);
     }
     */
     function addVdriver($data){
         return DBHelper::addRecord($data,$this->fields,$this->table); 
     }
 
      function updateVdriver($data){
         return DBHelper::updateRecord($data,$this->fields,$this->table,'vehicle_drivers_id'); 
      }
 
      function deleteVdrivers($ref_id){
          return DBHelper::deleteRecord($this->table,'vehicle_drivers_id',$ref_id);
      }

      function stats($status,$id){
          return DBHelper::licenseStatus($status,$id);
      }

      function agencyLogin($username,$password){
          return DBHelper::login($this->table,$username,$password);
      }
}