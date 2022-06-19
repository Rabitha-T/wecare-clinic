<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends My_Controller {

	

	public function __construct() {


		parent::__construct();

		if( $this->vendor == false ) {

			redirect('vendor-login');

		}

//        echo "<pre>"; print_r($this->vendor); exit;





	}

	

	public function index() {

		

		$this->data['page_title'] = 'Dashboard';
		$this->data['menu'] = 'dashboard';
		$this->data['submenu'] = '';
		$this->data['current_page'] = 'dashboard';

        $this->data['js_files'] = [
            base_url('assets/pages/js/vendor/dashboard.js?ver=1.0.1'),
        ];





        if( $this->vendor->is_approved == 0 ){

            $this->session->set_flashdata('msg','Please complete your profile and wait for admin approval to continue!');
            redirect('vendors-edit-profile');

        }



		$this->load->view( 'vendor/templates/header', $this->data );
		$this->load->view( 'vendor/dashboard/index', $this->data );
		$this->load->view( 'vendor/templates/footer', $this->data );

	}

    public function validate_otp( $otp ){



        $row_vendor = $this->common->get('vendors',['id' => $this->vendor->id ] );

        if( $otp == $row_vendor->otp ){

            $this->common->update('vendors', ['is_otp_verified' => 1 ],
                ['id' => $this->vendor->id ] );

            $this->session->set_flashdata('msg','Please complete your profile registration to continue!');

//            redirect('vendors-edit-profile');

            die(json_encode(
                [
                    'status' => 1,
                ]
            ));

            exit;




        }else{


            die(json_encode(
                [
                    'status' => 0,
                    'message' => 'Your OTP is not correct',
                ]
            ));

            exit;


        }

    }

}