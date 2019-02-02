<?php

require_once 'dbhelper/dbhelper.php';

Class Enforcer extends DBHelper{
    private $table = 'enforcer';
    private $fields = array(
        'enforcer_lname',
        'enforcer_fname',
        'enforcer_mi',
        'enforcer_addressProv',
        'enforcer_addressCity',
        'enforcer_mobile',
        'enforcer_tel',
        'enforcer_gender',
        'enforcer_email',
        'enforcer_password',
        'enforcer_status',
        'enforcer_type',
        'enforcer_birthdate',
        'agency_id'
    );
    
    function __construct(){
        return DBHelper::__construct();
    }

	/* function getUsers($id){
        return DBHelper::getAll($id); 
     } */
     function getEnforcers($id){
         return DBHelper::getById($this->table,'agency_id',$id);
     }

     function getEnforcerById($ref_id){
         return DBHelper::getOne($this->table,'enforcer_id',$ref_id);
     }

    /*
     function getProds($table,$ref_id){
         return DBHelper::getById(array($table,$this->table.'p'),'p.prod_id',$ref_id);
     }
     */
     function addEnforcer($data){
         return DBHelper::addRecord($data,$this->fields,$this->table); 
     }
 
      function updateEnforcer($data){
         return DBHelper::updateRecord($data,$this->fields,$this->table,'enforcer_id'); 
      }
 
      function deleteEnforcer($ref_id){
          return DBHelper::deleteRecord($this->table,'enforcer_id',$ref_id);
      }

      function stats($status,$id){
          return DBHelper::status($status,$id);
      }

}