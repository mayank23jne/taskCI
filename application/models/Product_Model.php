<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model {
    public function __construct(){
        parent::__construct();
     
    }

    public function getProducts($status=''){
        if($status)
        $this->db->where('status',$status);
        return $this->db->get('product');
    }
    public function getallProducts(){
        return $this->db->get('product');
    }

    public function getProductsbyid($pid){
      if($pid)
      $this->db->where('pid',$pid);
      return $this->db->get('product')->row();
    }
   
    public function getprouductuser($userid){
        $this->db->select('product.*, users_products.*');
        $this->db->where('users_products.userid',$userid);
        $this->db->join('product','product.pid=users_products.pid');
        $res = $this->db->get('users_products');
       // print_r($res);
       return $res;
    }

    public function getuserproducts($pid, $userid){
        $this->db->select('users_products.*, product.title, product.description');
        $this->db->where('users_products.pid',$pid);
        $this->db->where('users_products.userid',$userid);
        $this->db->join('product','product.pid=users_products.pid');
       $res = $this->db->get('users_products');
      return $res->row();
    }
 
    public function getnouserproduct(){
        $this->db->where("pid NOT IN (select pid from users_products)");
        $this->db->where('status',1);
        return $this->db->get('product');
    }

    public function getActiveAttachedproducts(){
        $this->db->select('SUM(users_products.qty) as totalqty');
        $this->db->where('product.status',1);
        $this->db->join('product','product.pid=users_products.pid');
        $res = $this->db->get('users_products');
        return $res;
    }


  

}