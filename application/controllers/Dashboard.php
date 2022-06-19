<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends My_Controller {

	

	public function __construct() {


		parent::__construct();

		if( $this->user == false ) {

			redirect('login');

		}

	}

	

	public function index() {

		

		$this->data['page_title'] = 'Dashboard';
		$this->data['menu'] = 'dashboard';
		$this->data['submenu'] = '';

//        echo"<pre>"; print_r(get_furnishing_status());exit;


		$this->load->view( 'templates/header', $this->data );
		$this->load->view( 'templates/sidebar', $this->data );
		$this->load->view( 'dashboard/index', $this->data );
		$this->load->view( 'templates/footer', $this->data );

	}

}