<?php

require 'dbhelper/dbhelper.php';

Class Driver extends DBHelper{
    private $table = 'driver';
    private $fields = array(
        'license_id',
        'driver_pincode',
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
    
    function __construct(){
        return DBHelper::__construct();
    }

	/* function getUsers($id){
        return DBHelper::getAll($id); 
     } */
     function getDriver(){
         return DBHelper::getAll($this->table);
     }

     function getEnforcerById($ref_id){
         return DBHelper::getOne($this->table,'enforcer_id',$ref_id);
     }

    /*
     function getProds($table,$ref_id){
         return DBHelper::getById(array($table,$this->table.'p'),'p.prod_id',$ref_id);
     }
     */
     function addDriver($data){
         return DBHelper::addRecord($data,$this->fields,$this->table); 
     }
 
      function updateDriver($data){
         return DBHelper::updateRecord($data,$this->fields,$this->table,'driver_id'); 
      }
 
      function deleteDriver($ref_id){
          return DBHelper::deleteRecord($this->table,'driver_id',$ref_id);
      }

      function stats($status,$id){
          return DBHelper::driverStatus($status,$id);
      }

}