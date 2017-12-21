<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	private $data = array();

	public function __construct(){

		parent::__construct();

		$sid		= $this->session->get_sessionID();
		$this->load->model("Cart_model");

		$cartList = $this->Cart_model->get_where(array(
			'sid' => $sid,
			'is_deleted' => 0,
		));

		$this->data['endpoint'] = "https://www.mobile88.com/epayment/entry.asp";
		$this->data['merchantCode'] = "M06919";
		$this->data['merchantKey'] = "oIGuAJiXEv";
		
		$this->data['cartList'] = $cartList;

	}

	public function index($page=1)
	{

		$this->load->model("Product_model");

		//how many records this table have
		$total_data = $this->Product_model->record_count();

		//how many data per page
		$limit = 8;

		//how many pages we have
		// 2.5 => 3
		// 3.1 => 4
		$total_pages = ceil($total_data / $limit);

		$start = ($page - 1) * $limit;

		$productList = $this->Product_model->fetch($start, $limit);

		//echo $this->db->last_query();
		//exit;


		$this->load->library('pagination');

		$config['base_url'] = base_url().'/';
		$config['total_rows'] = $total_data;
		$config['per_page'] = $limit;


		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';


		$this->pagination->initialize($config);

		$links = $this->pagination->create_links();

		
		$this->data['productList'] = $productList;
		$this->data['page'] = $page;
		$this->data['total_pages'] = $total_pages;
		$this->data['links'] = $links;

		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/index', $this->data);
		$this->load->view('frontend/footer', $this->data);
	}

	public function about(){

		$this->load->view('header');
		$this->load->view('about');
	}

	public function products(){

		$this->load->view('header');
		$this->load->view('products');
	}

	public function product_detail($product_id, $product_name){		

		$this->load->model("Product_model");

		//SELECT * FROM products WHERE id = '$product_id'
		$productData = $this->Product_model->getOne(array(
			'id' => $product_id,
		));

		
		$this->data['productData'] = $productData;

		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/product-detail', $this->data);
		$this->load->view('frontend/footer', $this->data);
	}

	public function addcart(){

		$product_id = $this->input->post("product_id", true);
		$qty 		= $this->input->post("qty", true);
		$sid		= $this->session->get_sessionID();

		//echo $sid;
		//exit;

		$this->load->model("Cart_model");
		$this->load->model("Product_model");

		$cartExist = $this->Cart_model->getOne(array(
			'sid' => $sid,
			'product_id' => $product_id,
			'is_deleted' => 0,
		));
		//this product is not yet inside the cart
		if(empty($cartExist)) {

			//we get product price and title from our own database
			$productData = $this->Product_model->getOne(array(
				'id' => $product_id,
			));

			$product_title = $productData['title'];
			$product_price = $productData['price'];

			$this->Cart_model->insert(array(
				'sid' => $sid,
				'product_id' => $product_id,
				'product_title' => $product_title,
				'product_price' => $product_price,
				'qty' => $qty,
				'created_date' => date("Y-m-d H:i:s"),
			));

		//it is inside the cart
		} else {

			$this->Cart_model->update(array(
				'id' => $cartExist['id'],
			),array(
				'qty' => ($cartExist['qty']+$qty),
				'modified_date' => date("Y-m-d H:i:s"),
			));


		}

		redirect(base_url('cart'));
	
	}

	public function cart(){

		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/cart', $this->data);
		$this->load->view('frontend/footer', $this->data);

	}	

	public function checkout(){

		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/checkout', $this->data);
		$this->load->view('frontend/footer', $this->data);

	}

	public function checkout_submit(){
		
		$firstName = $this->input->post('firstName', true);
		$lastName = $this->input->post('lastName', true);
		$tel = $this->input->post('tel', true);
		$fax = $this->input->post('fax', true);
		$email = $this->input->post('email', true);
		$addr1 = $this->input->post('addr1', true);
		$addr2 = $this->input->post('addr2', true);
		$country = $this->input->post('country', true);
		$city = $this->input->post('city', true);
		$zipcode = $this->input->post('zipcode', true);
		$addiInfo = $this->input->post('addiInfo', true);
		$shipFirstName = $this->input->post('shipFirstName', true);
		$shipLastName = $this->input->post('shipLastName', true);
		$shipTel = $this->input->post('shipTel', true);
		$shipFax = $this->input->post('shipFax', true);
		$shipEmail = $this->input->post('shipEmail', true);
		$shipAddr1 = $this->input->post('shipAddr1', true);
		$shipAddr2 = $this->input->post('shipAddr2', true);
		$shipCountry = $this->input->post('shipCountry', true);
		$shipCity = $this->input->post('shipCity', true);
		$shipZipCode = $this->input->post('shipZipCode', true);
		$shipSameBill = $this->input->post('shipSameBill', true);


		if(!empty($shipSameBill)) {

			$shipFirstName = $firstName;
			$shipLastName = $lastName;
			$shipTel = $tel;
			$shipFax = $fax;
			$shipEmail = $email;
			$shipAddr1 = $addr1;
			$shipAddr2 = $addr2;
			$shipCountry = $country;
			$shipCity = $city;
			$shipZipCode = $zipcode;

		}

		$this->load->model('Purchase_order_model');
		$this->load->model('Purchase_order_details_model');

		$order_serial = date("YmdHis").rand(100,999);

		$order_id = $this->Purchase_order_model->insert(array(
			'order_serial' => $order_serial,
			'firstName' => $firstName,
			'lastName'	=> $lastName,
			'tel'		=> $tel,
			'fax'		=> $fax,
			'email'		=> $email,
			'addr1'		=> $addr1,
			'addr2'		=> $addr2,
			'country'	=> $country,
			'city'		=> $city,
			'zipcode'	=> $zipcode,
			'addiInfo'	=> $addiInfo,
			'shipFirstName' => $shipFirstName,
			'shipLastName' => $shipLastName,
			'shipTel'		=> $shipTel,
			'shipFax'		=> $shipFax,
			'shipEmail'		=> $shipEmail,
			'shipAddr1'		=> $shipAddr1,
			'shipAddr2'		=> $shipAddr2,
			'shipCountry'	=> $shipCountry,
			'shipCity'		=> $shipCity,
			'shipZipCode'	=> $shipZipCode,
			'created_date'	=> date("Y-m-d H:i:s"),
		));

		$total_amount = 0;
		if(!empty($this->data['cartList'])) {
			foreach($this->data['cartList'] as $v) {

				$total_amount += ($v['product_price']*$v['qty']);

				$this->Purchase_order_details_model->insert(array(
					'order_id' => $order_id,
					'product_id' => $v['product_id'],
					'title' => $v['product_title'],
					'price' => $v['product_price'],
					'qty' => $v['qty'],
					'created_date'	=> date("Y-m-d H:i:s"),
				));		
			}
		}


		$this->Purchase_order_model->update(array(
			'id' => $order_id,
		),
		array(
			'total_amount' => $total_amount,
			'modified_date' => date("Y-m-d H:i:s"),
		));

		$sid		= $this->session->get_sessionID();

		$cartList = $this->Cart_model->update(array(
			'sid' => $sid,
		), array(
			'is_deleted' => 1,
			'modified_date' => date("Y-m-d H:i:s"),
		));

		//Send Email
		$this->load->library("emailer");

		$html  = "";
		$html .= "Hi,<br/>";
		$html .= "You have receive this email because someone has make purchase from your website<br/>";
		$html .= "<br/><br/>";
		$html .= "Yours sincerely";


		$this->emailer->send("newtonstudio@gmail.com", "Purchase Order [".$order_serial."]", $html);

		redirect(base_url('checkout_payment/'.$order_id));

	}


	public function iPay88_signature($source)
	{
	  return base64_encode($this->hex2bin(sha1($source)));
	}


	private function hex2bin($hexSource)
	{		
		 $bin = "";
			for ($i=0;$i<strlen($hexSource);$i=$i+2)
			{
			  $bin .= chr(hexdec(substr($hexSource,$i,2)));
			}
		  return $bin;
	} 

	//Payment Step1
	public function checkout_payment($order_id){

		$this->load->model('Purchase_order_model');
		$this->load->model('Purchase_order_details_model');

		$poData = $this->Purchase_order_model->getOne(array(
			'id' => $order_id,
			'pay_status' => 0,
			'is_deleted' => 0,
		));

		if(empty($poData)) {
			show_error("This Purchase order is not exists");
		}

		$poDetails = $this->Purchase_order_details_model->get_where(array(
			'order_id' => $order_id,
			'is_deleted' => 0,
		));

		$productDesc = "";
		if(!empty($poDetails)) {
			foreach($poDetails as $v) {
				$productDesc[] = $v['title'];
			}
		}

		$this->data['productDesc'] = substr(implode(",",$productDesc),0,100);

		$this->data['poData'] = $poData;


		//ipay88 signature 
		$MerchantKey = $this->data['merchantKey'];
		$MerchantCode = $this->data['merchantCode'];
		$RefNo = $poData['order_serial'];
		$amount = str_replace(".", "", $poData['total_amount']); // must remove , and . before hash
		$currency = "MYR";


		$this->data['RefNo'] = $RefNo;
		$this->data['amount'] = $amount;
		$this->data['currency'] = $currency;
		$this->data['signature'] = $this->iPay88_signature($MerchantKey.$MerchantCode.$RefNo.$amount.$currency);




		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/checkout_payment', $this->data);
		$this->load->view('frontend/footer', $this->data);


	}

	//2nd step
	public function checkout_callback(){

		try{

			$merchantcode = $_REQUEST["MerchantCode"];
			$paymentid = $_REQUEST["PaymentId"];
			$refno = $_REQUEST["RefNo"];
			$amount = $_REQUEST["Amount"];
			$ecurrency = $_REQUEST["Currency"];
			$remark = $_REQUEST["Remark"];
			$transid = $_REQUEST["TransId"];
			$authcode = $_REQUEST["AuthCode"];
			$estatus = $_REQUEST["Status"];
			$errdesc = $_REQUEST["ErrDesc"];
			$signature = $_REQUEST["Signature"];

			$mysignature = $this->iPay88_signature($this->data['merchantKey'].$merchantcode.$refno.$amount.$ecurrency);

			if($mysignature != $signature) {
				throw new Exception("Signature error: ".$signature." vs ".$mysignature);
			}

			$this->load->model("Purchase_order_model");

			$poData = $this->Purchase_order_model->getOne(array(
				'order_serial' => $refno,
			));
			if(empty($poData)) {
				throw new Exception("This purchase order is not exists");
			}

			if(!empty($poData['pay_status'])) {
				throw new Exception("This purchase order already paid");
			}

			$this->Purchase_order_model->update(array(
				'id' => $poData['id'],
			), array(
				'pay_status' => 1,
				'modified_date' => date("Y-m-d H:i:s"),
			));
			echo "RECEIVEOK";


		} catch (Exception $e) {

			//Send Email
			$this->load->library("emailer");

			$html  = $e->getMessage();

			$this->emailer->send("newtonstudio@gmail.com", "ERROR in checkout_callback", $html);
			echo "RECEIVEOK";

		}


		


		

	}

	//last step
	public function checkout_completed($order_id){

		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/checkout_completed', $this->data);
		$this->load->view('frontend/footer', $this->data);

	}


}
