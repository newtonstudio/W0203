<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function index()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/index');
		$this->load->view('frontend/footer');
	}

	public function about(){

		$this->load->view('header');
		$this->load->view('about');
	}

	public function products(){

		$this->load->view('header');
		$this->load->view('products');
	}

	public function product_detail(){

		$this->load->view('header');
		$this->load->view('product_detail');
	}

	public function contact(){
		
		$this->load->view('header');
		$this->load->view('contact');
	}

}
