<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {
    public function __construct(){
        parent::__construct();
     
    }
    //      public function login_data($data){
        
    //     $query=$this->db->where($data);
    //     $this->db->where('status','1');
    //     $login=$this->db->get('users');
    //      if($login!=NULL){
    //   return  $login->row();
      //$verified
    //  if($res->verified==1){
    //     $verified = 'Login';
    //  }else{
    //      $verified = "Please verified first";
    //  }
    //   return $verified;
         
        //  }}  
       
         public function get_user($userid)
         {
             $this->db->where('userid',$userid);
             return $this->db->get('users')->row();
         }
         public function get_users($active='',$verified='')
         {
                 if($active)
                 $this->db->where('status',$active);
                 if($verified)
                 $this->db->where('verified',$verified);
             return $this->db->get('users');
         }
       
         public function register($data)
         {
             $this->db->insert('users',$data);
             return $this->db->insert_id(); 
         }

         public function getActiveUsersWithActiveProduts()
         {
              $this->db->select('users.*');
              $this->db->join('users_products','users_products.userid = users.id');
              $this->db->join('product','product.pid = users_products.pid');
             $this->db->where('users.status',1);
             $this->db->where('users.verified',1);
             $this->db->where('product.status',1);
             return $this->db->get('users');
         }
     
         
         public function getSummaryActiveProductsWithUsers()
         {
              $this->db->select('sum(users_products.qty * users_products.price)  as pricesum',false);
              $this->db->join('users_products','users_products.userid = users.id');
              $this->db->join('product','product.pid = users_products.pid');
             $this->db->where('users.status',1);
             $this->db->where('users.verified',1);
             $this->db->where('product.status',1);
             return $this->db->get('users');
         }
     
         public function getSummaryProductsWithUsersWise()
         {
              $this->db->select('users.name,users.status,product.status,sum(users_products.qty * users_products.price)  as psum',false);
              $this->db->join('users_products','users_products.userid = users.id');
              $this->db->join('product','product.pid = users_products.pid');
              $this->db->group_by('users.name,users.status,users.verified,product.status');
            
             $this->db->having('users.verified',1);
             $this->db->having('users.status',1);
             $this->db->having('product.status',1);
             $res= $this->db->get('users');
           
             return $res;
         }
     
       
     
         
     
       
   }
