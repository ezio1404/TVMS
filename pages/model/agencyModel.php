<?php

require 'dbhelper/dbhelper.php';

Class Agency extends DBHelper{
    private $table = 'agency';
    private $fields = array(
        'agency_name',
        'agency_head',
        'agency_email',
        'agency_password',
        'agency_address1',
        'agency_address2',
        'agency_tel1',
        'agency_tel2',
        'agency_status',
        'agency_subStartDate',
        'agency_subExpiryDate',
        'agency_subFee',
        'agency_subStatus'
    );
    
    private $edit = array(
        'agency_name',
        'agency_head',
        'agency_email',
        'agency_address1',
        'agency_address2',
        'agency_tel1',
        'agency_tel2'
    );

    function __construct(){
        return DBHelper::__construct();
    }

	/* function getUsers($id){
        return DBHelper::getAll($id); 
     } */
     function getEnforcers(){
         return DBHelper::getAll($this->table);
     }

     function getAgencyById($ref_id){
         return DBHelper::getOne($this->table,'agency_id',$ref_id);
     }

    /*
     function getProds($table,$ref_id){
         return DBHelper::getById(array($table,$this->table.'p'),'p.prod_id',$ref_id);
     }
     */
     function addAgency($data){
         return DBHelper::addRecord($data,$this->fields,$this->table); 
     }
 
      function updateAgency($data){
         return DBHelper::updateRecord($data,$this->edit,$this->table,'agency_id');
      }
 
      function deleteEnforcer($ref_id){
          return DBHelper::deleteRecord($this->table,'enforcer_id',$ref_id);
      }

      function stats($status,$id){
          return DBHelper::status($status,$id);
      }

      function agencyLogin($username,$password){
          return DBHelper::login($this->table,$username,$password);
      }
}