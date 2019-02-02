<?php

require 'dbhelper/dbhelper.php';

Class License extends DBHelper{
    private $table = 'license';
    private $fields = array(
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
     function getLicense(){
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
     function addLicense($data){
         return DBHelper::addRecord($data,$this->fields,$this->table); 
     }
 
      function updateLicense($data){
         return DBHelper::updateRecord($data,$this->fields,$this->table,'license_id'); 
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