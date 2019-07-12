<?php

require 'dbhelper/dbhelper.php';

Class Line extends DBHelper{
    private $table = 'hotline';
    private $fields = array(
        'hotline_name',
        'hotline_number'
    );

    function __construct(){
        return DBHelper::__construct();
    }

	/* function getUsers($id){
        return DBHelper::getAll($id); 
     } */
     function getHotline(){
         return DBHelper::getAll($this->table);
     }

     function getAgencyById($ref_id){
         return DBHelper::getOne($this->table,'hotline_id',$ref_id);
     }

    /*
     function getProds($table,$ref_id){
         return DBHelper::getById(array($table,$this->table.'p'),'p.prod_id',$ref_id);
     }
     */
     function addHotline($data){
         return DBHelper::addRecord($data,$this->fields,$this->table); 
     }

     function addSub($data){
        return DBHelper::addRecord($data,$this->sub,$this->table2); 
    }
 
      function updateHotline($data){
         return DBHelper::updateRecord($data,$this->fields,$this->table,'hotline_id');
      }
 
      function deleteHotline($ref_id){
          return DBHelper::deleteRecord($this->table,'hotline_id',$ref_id);
      }

      function stats($status,$id){
          return DBHelper::agencyStatus($status,$id);
      }

      function agencyLogin($username,$password){
          return DBHelper::login($this->table,$username,$password);
      }
}