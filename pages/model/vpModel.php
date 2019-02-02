<?php

require 'dbhelper/dbhelper.php';

Class Violation extends DBHelper{
    private $table = 'violation';
    private $fields = array(
        'ordinanceNo',
        'articleNo',
        'violation_desc',
        'violation_penalty',
        'agency_id'
    );
    
    function __construct(){
        return DBHelper::__construct();
    }

	/* function getUsers($id){
        return DBHelper::getAll($id); 
     } */
     function getViolations(){
         return DBHelper::getById($this->table,"agency_id",$_SESSION['id']);
     }

     function getEnforcerById($ref_id){
         return DBHelper::getOne($this->table,'enforcer_id',$ref_id);
     }

    /*
     function getProds($table,$ref_id){
         return DBHelper::getById(array($table,$this->table.'p'),'p.prod_id',$ref_id);
     }
     */
     function addViolation($data){
         return DBHelper::addRecord($data,$this->fields,$this->table); 
     }
 
      function updateViolation($data){
         return DBHelper::updateRecord($data,$this->fields,$this->table,'violation_id'); 
      }
 
      function deleteViolation($ref_id){
          return DBHelper::deleteRecord($this->table,'violation_id',$ref_id);
      }

      function stats($status,$id){
          return DBHelper::status($status,$id);
      }

}