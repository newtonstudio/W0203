<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

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

		$data = array();
		$data['productList'] = $productList;
		$data['page'] = $page;
		$data['total_pages'] = $total_pages;
		$data['links'] = $links;

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/index', $data);
		$this->load->view('frontend/footer', $data);
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

		$data = array();
		$data['productData'] = $productData;

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/product-detail', $data);
		$this->load->view('frontend/footer', $data);
	}

	public function addcart(){

		$product_id = $this->input->post("product_id", true);
		$qty 		= $this->input->post("qty", true);
		$sid		= $this->session->get_sessionID();

		$this->load->model("Cart_model");
		$this->load->model("Product_model");

		$cartExist = $this->Cart_model->getOne(array(
			'sid' => $sid,
			'product_id' => $product_id,
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

		$sid		= $this->session->get_sessionID();
		$this->load->model("Cart_model");

		$cartList = $this->Cart_model->get_where(array(
			'sid' => $sid,
		));


		$data = array();
		$data['cartList'] = $cartList;

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/cart', $data);
		$this->load->view('frontend/footer', $data);

	}	

	public function contact(){
		
		$this->load->view('header');
		$this->load->view('contact');
	}

}
