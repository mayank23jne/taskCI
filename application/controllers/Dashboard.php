<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
      
    }
	public function index()
	{    
		$this->load->model('User_Model');
		$this->load->model('Product_Model');
		$this->data['users']['activevarified']=$this->User_Model->get_users(1,1);
		$this->data['users']['attachedproducts']=$this->User_Model->getActiveUsersWithActiveProduts();
		$this->data['product']['allactiveproducts']=$this->Product_Model->getProducts($status=1);
		$this->data['product']['notattachedproduct']=$this->Product_Model->getnouserproduct();
		$this->data['product']['amountactiveattachedproduct']=$this->Product_Model->getActiveAttachedproducts();
		$this->data['users']['summarizedPrice']=$this->User_Model->getSummaryActiveProductsWithUsers();
		$this->data['users']['productperuser']=$this->User_Model->getSummaryProductsWithUsersWise();
		// print_r($this->data);
	    // $currency =	$this->currency('USD','RON','$25');
		// print_r($currency);
		$this->load->view('dashboard', $this->data);

	}

//    public function currency($to,$from,$amount) {

// 	$curl = curl_init();


// curl_setopt_array($curl, array(
//    CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=USD&from=RON&amount=20",
//   CURLOPT_HTTPHEADER => array(
//     "Content-Type: text/plain",
//     "apikey: VowtH1A7FekgnRlVF0y9I0vY2OQTDwc4"
//   ),
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "GET"
// ));
// $response = curl_exec($curl);

// curl_close($curl);
// $res= json_decode($response);
// // print_r($res->result);
// //  if($res->result){
// // 	 return $res->result;
// //  }
//  return $response;
// print_r($res) ;


// 		}
	}
?>