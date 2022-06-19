<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'vendor/autoload.php';

class Auth extends My_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function register( $type =''){

		if ( $this->session->userdata('vendor_logged_in') ) {
			redirect('/vendors-dashboard');
		}



		$this->data['js_files'] = array(
            'https://js.stripe.com/v3/',
			base_url('assets/pages/js/vendor/register.js?ver=1.0.0')
		);

        $this->data["type"] = $type;

		$this->data['page_title'] = $type;

        $this->data['error'] = '';

            $this->data["row"] = array(
                'name' => '',
                'email' => '',
                'registration_no' => '',
                'department_id' => '',
                'tnc' => '',
                'cpassword' => '',
                'password' => '',
            );

        $this->data["arr_department"] = $arr_department = $this->common->get_all('departments');



            if( isset($_POST['sign_up']) ){

                $this->data["type"] = 'register';

                $this->form_validation->set_message('required', '%s is required.');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[vendors.email]',
                    array('is_unique' => 'This email is already being used by someone.'));

                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|matches[cpassword]');
                $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

                $this->form_validation->set_rules('name', 'Name', 'trim|required');
                $this->form_validation->set_rules('registration_no', 'Registration Name', 'trim|required');
                $this->form_validation->set_rules('department_id', 'Department', 'trim|required');

                $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');

                if( !$this->form_validation->run() ) {

                    $this->data["row"] = array_merge( $this->data["row"], $_POST );

                } else {

                    $otp = rand(1000, 9999);


//                    $stripe = new \Stripe\StripeClient(
//                        $this->core_settings->stripe_sk
//                    );
//                    $customer = $stripe->customers->create([
//                        'email' => trim($this->input->post('email')),
//                        'name' => trim($this->input->post('name')),
//                    ]);



                    $user_arr = array(
                        'email'=> trim($this->input->post('email')),
                        'password'=> md5($this->config->item('encryption_key').trim($this->input->post('password'))),
                        'name'=> trim($this->input->post('name')),
                        'registration_no' => trim($this->input->post('registration_no')),
                        'department_id' => trim($this->input->post('department_id')),
                        'otp' => $otp,
                        'created_at' => date('Y-m-d H:i:s'),
//                        'stripe_customer_id' =>$customer->id,
                    );

                    $user_id = $this->common->insert( 'vendors', $user_arr );





                    $params = array(
                        'name' => trim($this->input->post('name')),
                        'email' => trim($this->input->post('email')),
                        'login-url' => '<a href="'.site_url('vendor-login').'">'.site_url('vendor-login').'</a>',
                        'site_name' => $this->data['core_settings']->site_name,
                        'site_email' => $this->data['core_settings']->email,
                    );

                    send_mail_vendor('welcome', $this->input->post('email'), $params);

                    $sess_array = array(
                        'username'       => trim($this->input->post('email')),
                        'email'          => trim($this->input->post('email')),
                        'vendor_user_id'        => $user_id,
                        'vendor_logged_in' => TRUE,
                        'group_id'       => 2,
                    );
                    $this->session->set_userdata($sess_array);

                    $this->common->update('vendors', array( 'last_login' => date('Y-m-d H:i:s') ),
                        array( 'id' => $user_id ) );

                    redirect('vendors-dashboard');
                }

            }



            if ( isset($_POST['sign_in']) ){

                $this->data["type"] = 'login';

                $email = trim($this->input->post('email'));

                $password = md5($this->config->item('encryption_key').trim($this->input->post('password')));


                if($email && $password){

                    $user = $this->common->vendor_login($email, $password);

//                echo $this->db->last_query();exit;

                    if( !empty($user) ){

                        if ( $this->input->post('remember') == 1 ) {

                            $cookie = array(
                                'name' => 'title_username',
                                'value' => $email,
                                'expire' => '2592000'
                            );
                            set_cookie($cookie);

                        } else {

                            $cookie = array(
                                'name' => 'title_username',
                                'value' => '',
                                'expire' => '1'
                            );
                            set_cookie($cookie);
                        }


                        $sess_array = array(
                            'username'       => $user->email,
                            'email'          => $user->email,
                            'vendor_user_id'        => $user->id,
                            'vendor_logged_in' => TRUE,
                            'group_id'       => 2,
                        );
                        $this->session->set_userdata($sess_array);

                        $this->common->update('vendors', array( 'last_login' => date('Y-m-d H:i:s') ), array( 'id' => $user->id ) );
                        redirect('vendors-dashboard');

                    } else {
                        $this->data['error'] = 'Invalid Email or Password';
                    }

                } else {
                    $this->data['error'] = 'Invalid Email or Password';
                }
            }


		$this->load->view('vendor/templates/header_ui', $this->data);
		$this->load->view('vendor/auth/register', $this->data);
		$this->load->view('vendor/templates/footer_ui', $this->data);
	}


	public function forgot_password(){

		if ($this->session->userdata('vendor_logged_in'))
			redirect('vendors-dashboard');
			
		$defaults =  array('email' => '');
		$this->data['error'] = '';
		$this->data['success'] = '';
		$this->data['page_title'] = 'Forgot Password';
		$this->data['type'] = 'login';

		if($_POST) {

			$email = trim($this->input->post('email'));
			if( $email ) {

				$user = $this->common->get( 'vendors', array( 'lower(email)'=>strtolower($email) ) );
				if( !empty($user) ) {
					$key = random_string(); 
					$today = time();
					$tomorrow = date('Y-m-d H:i:s', strtotime('+1 day', $today));

					$update_arr = array(
						'password_reset_key' => $key,
						'password_reset_key_expiration' => $tomorrow
					);

					$this->common->update('vendors',$update_arr,array('id'=>$user->id));
					$click_here = '<a href="'.site_url('vendor/auth/reset_password/'.$key).'"
					target="_blank">'.site_url('vendor/auth/reset_password/'.$key).' </a>';
					//send reset mail
					$params = array(
						'name' => $user->name,
						'reset-url' => $click_here,
						'site_name' => $this->data['core_settings']->site_name,
						'site_email' => $this->data['core_settings']->email,
					);

					$mail = send_mail_vendor('forgot-password', $user->id, $params);
					$this->data['success'] = 'Email has been sent to the address you entered.';

				} else {
					$this->data['success'] = 'You will receive an email if the email you have entered is correct.';
				}
			} else {
				$this->data['success'] = 'You will receive an email if the email you have entered is correct.';
			}
		}

		$this->load->view('vendor/templates/header_ui', $this->data);
		$this->load->view('vendor/auth/forgot_password', $this->data);
		$this->load->view('vendor/templates/footer_ui', $this->data);
	}

	public function reset_password( $key = "" ){

        $this->data['type'] = 'login';
        $this->data['success'] = '';
        $this->data['error'] = '';

		if ($this->session->userdata('vendor_logged_in'))
			redirect('vendors-dashboard');

		$this->data['page_title'] = 'Reset Password';	
		$query = $this->db->query("select * from vendors WHERE password_reset_key ='".$key."' AND ( password_reset_key_expiration > (NOW() - INTERVAL 1 DAY))");
		$user = $query->row();
		if(empty($user)){
			$this->session->set_flashdata('error', 'Your  password reset time expired. Please try again. ');
			redirect('vendor_forgot_password');
		}

		$this->data["row"] = array(
			'password' => '',
			'cpassword' => '',
		);

		$this->form_validation->set_message('required', '%s is required.');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if($_POST) {

			if ( $this->form_validation->run() ) {

				$update_arr = array(
					'password' => md5( $this->config->item('encryption_key').$this->input->post('password') ),
					'password_reset_key' => '',
					'password_reset_key_expiration' => ''
				);

				$this->common->update( 'vendors',$update_arr,array('id' => $user->id) );

				$params = array(
					'name' => $user->name,
					'site_name' => $this->data['core_settings']->site_name,
					'site_email' => $this->data['core_settings']->email,
				);

                send_mail_vendor('password-changed', $user->id, $params);

				$this->session->set_flashdata('success', 'Your password changed successfully. ');
				redirect('/vendor-login');

			} else {
				$this->data["row"] = array_merge($this->data["row"],$_POST);
			}
		}

		$this->load->view('vendor/templates/header_ui', $this->data);
		$this->load->view('vendor/auth/reset_password', $this->data);
		$this->load->view('vendor/templates/footer_ui', $this->data);
	}


	public function logout(){
		$this->session->sess_destroy();
        redirect('vendor-login');
	}
}