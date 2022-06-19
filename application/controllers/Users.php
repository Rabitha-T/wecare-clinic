<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends My_Controller {

	public function __construct() {
		parent::__construct();
		if( !$this->session->userdata('logged_in') ) {
			redirect('login');
		}
		$this->common->check_user_exists();
	}

	public function index() {

		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {
			redirect('dashboard');
		}

		$this->data['page_title'] = 'Admin Users';
		$this->data['menu'] = 'users';
		$this->data['submenu'] = 'list';
		$condition = '';
		$search["group_id"] = '';
		if( $_POST  ) { 
		    if( $this->input->post("group_id") != "" ){

				$search["group_id"] = $this->input->post("group_id");

			}

			$this->session->set_userdata(array("search" => $search));

			

		} else if($this->uri->segment(3) !="page") {

			$this->session->set_userdata(array("search" => array()));

		} else if(is_array($this->session->userdata("search")) && count($this->session->userdata("search"))) {

			$search = $this->session->userdata("search");

		}

		

		if( $search["group_id"] != '' ) {

			if( $condition != '' ) {

				$condition = ' AND group_id = '.$search["group_id"];

			} else {

				$condition = ' group_id = '.$search["group_id"];

			}

		}

		$this->data['search'] = $search;

		$this->data["result"] = $this->common->get_all('users', $condition, 'SQL_CALC_FOUND_ROWS *', '', 30, $this->uri->segment(4));

		$total = $this->common->get_search_count();

		$config['base_url'] = site_url('users/index/page/');

		$config['total_rows'] = $total;

		$config['per_page'] = 30;

		$config['num_links'] = 2;

		$config['uri_segment'] = 4;

		

		$config['anchor_class'] = '';

		$config['next_link'] = '<i class="fa fa-angle-double-right"></i>';

		$config['prev_link'] = '<i class="fa fa-angle-double-left"></i>';

		$config['next_tag_open'] = '<li>';

		$config['next_tag_close'] = '</li>';

		$config['prev_tag_open'] = '<li>';

		$config['prev_tag_close'] = '</li>';

		$config['prev_link_not_exists'] = '';

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';

		$config['cur_tag_close'] = '</a></li> ';

		$config['first_tag_open'] = '<li>';

		$config['first_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';

		$config['last_tag_close'] = '</li>';

		

		$this->pagination->initialize($config); 

		$this->data["pagination"] = $this->pagination->create_links();

		

		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('users/index',$this->data);
		$this->load->view('templates/footer',$this->data);

	}



	function profile() {

		

		$this->data['page_title'] = 'Edit My Profle';
		$this->data['menu'] = 'users';
		$this->data['submenu'] = 'profile';

		$this->data['css_files'] = array(

			base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
			base_url('assets/pages/css/profile.min.css'),

			);



		$this->data['js_files'] = array(

			base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),
			base_url('assets/pages/js/jquery.sparkline.min.js'),
			base_url('assets/pages/js/profile.min.js'),

		);  

		

		$row = $this->common->get('users', array('id' => $this->session->userdata('user_id') ), 'array');

		$row['new_password'] = '';
		$row['retype_new_password'] = '';
		$this->data['row'] = $row;

		$this->data['tab'] = 'personal';

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if($_POST) {



			if ( isset($_POST['personal_info']) ) {

				$this->data['tab'] = 'personal';

				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check['.$this->session->userdata('user_id').']');

				$this->form_validation->set_rules('first_name', 'First name', 'trim|required');

				$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');



				if( $this->form_validation->run() == false ){

					$this->data['row'] = array_merge( $this->data['row'], $_POST );

				} else {



					$data_arr = array(

						'email'=> trim($this->input->post('email')),

						'first_name'=> trim($this->input->post('first_name')),

						'phone' => trim($this->input->post('phone')),

					);

					$this->common->update('users',$data_arr, array('id' => $this->session->userdata('user_id') ));

					$this->session->set_flashdata('msg','Personal informations updated successfully!');

					redirect('users/profile');

				}



			} else if ( isset($_POST['profile_pic']) ) {



				$this->data['tab'] = 'profile_pic';

				$config['upload_path'] = './files/profile/';

				$config['encrypt_name'] = TRUE;

				$config['allowed_types'] = 'gif|jpg|jpeg|png';

				

				$this->load->library('upload', $config);

				if ( $this->upload->do_upload('image') ){ 

					$data = array('upload_data' => $this->upload->data());

					$data_arr['image'] = $data['upload_data']['file_name'];



					if( !file_exists( getcwd().'/files/profile/'.$this->session->userdata('user_id') ) ) {

						mkdir( getcwd().'/files/profile/'.$this->session->userdata('user_id') );

					}

					

					rename( getcwd().'/files/profile/'.$data['upload_data']['file_name'], getcwd().'/files/profile/'.$this->session->userdata('user_id').'/'.$data['upload_data']['file_name'] );

					

					$old_path = $new_path = getcwd().'/files/profile/'.$this->session->userdata('user_id').'/'.$data['upload_data']['file_name'];

					$this->image_thumb( $old_path, $new_path );



					$this->common->update('users',$data_arr, array('id' => $this->session->userdata('user_id') ));

					$this->session->set_flashdata('msg','Profile picture updated successfully!');

					redirect('users/profile');

				} else {

					 $error = array('error' => $this->upload->display_errors());

					 foreach ($error as  $flashdata_error) {

					 	$this->session->set_flashdata('error_msg',$flashdata_error);

					 }

				}

			} else if ( isset($_POST['user_password']) ) {

				$this->data['tab'] = 'password';

				$this->form_validation->set_rules('new_password', 'New password', 'trim|required');

				$this->form_validation->set_rules('retype_new_password', 'Retype new password', 'trim|required');

				

				if( $this->form_validation->run() == false ){

					$this->data['row'] = array_merge( $this->data['row'], $_POST );

				} else {

					

					$new_password = md5($this->config->item('encryption_key').trim($this->input->post('new_password')));

					$retype_new_password = md5($this->config->item('encryption_key').trim($this->input->post('retype_new_password')));



					if ( $new_password != $retype_new_password ){

						$this->session->set_flashdata('error_msg','Passwords are not matching!');

					} else { 

						$data_arr['password'] =  $new_password;

						$this->common->update('users',$data_arr, array('id' => $this->session->userdata('user_id') ));



						$params = array(

							'name' => $row['first_name'].' '.$row['last_name'],

							'site_name' => $this->data['core_settings']->site_name,

							'site_email' => $this->data['core_settings']->email,

						);

						send_mail('password-changed', $this->session->userdata('user_id'), $params);



						$this->session->set_flashdata('msg','Password updated successfully!');

						redirect('users/profile');

					}

				}

			}

		}

		

		$this->load->view('templates/header',$this->data);

		$this->load->view('templates/sidebar',$this->data);

		$this->load->view('users/profile',$this->data);

		$this->load->view('templates/footer',$this->data);

	}

	

	public function create() {

		

		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

			redirect('dashboard');

		}



		$this->data['page_title'] = 'New User';
		$this->data['menu'] = 'users';
		$this->data['submenu'] = 'add';
		$this->data['action'] = 'add';

		

		$this->data['row'] = array(

			'group_id'=>'',
			'email'=>'',
			'password'=>'',
			'first_name'=>'',
			'last_name' => '',

		);

		

		$this->form_validation->set_message('required', '%s is required.');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]',  array('is_unique' => 'This email is already being used by someone.'));

		$this->form_validation->set_rules('group_id', 'User Type', 'trim|required');
		$this->form_validation->set_rules('first_name', 'First name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		

		if($_POST) {

			if( $this->form_validation->run() == false ){

				$this->data['row'] = array_merge( $this->data['row'], $_POST );

			} else {

				$key = random_string();

				$data_arr = array(

					'group_id' => trim($this->input->post('group_id')),
					'email'=> trim($this->input->post('email')),
					'first_name'=> trim($this->input->post('first_name')),
					'last_name' => trim($this->input->post('last_name')),
					'created_at' => date('Y-m-d H:i:s'),
					'invite_key' => $key,
					'is_active' => 2,

				);

				

				$id = $this->common->insert( 'users', $data_arr );

				$click_here = '<a href="'.site_url('set_password/'.$key).'" target="_blank">'.site_url('set_password/'.$key).' </a>'; 

				$params = array(

					'name' => trim($this->input->post('first_name')).' '.trim($this->input->post('last_name')),
					'invite-url' => $click_here,
					'site_name' => $this->data['core_settings']->site_name,
					'site_email' => $this->data['core_settings']->email,

				);

				send_mail('invite-user', $id, $params);

				

				$this->session->set_flashdata('msg','Saved!');

				redirect('users/edit/'.encrypt($id));

			}

		}

		

		$this->load->view('templates/header',$this->data);

		$this->load->view('templates/sidebar',$this->data);

		$this->load->view('users/form',$this->data);

		$this->load->view('templates/footer',$this->data);

	}



	function edit( $user_salt_id = 0) {

		

		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

			redirect('dashboard');

		}

		

		if( $user_salt_id == '0' ) {

			redirect('dashboard');

		}

		$id = decrypt($user_salt_id)*1;

		if( !is_int($id) || !$id ) {

			redirect('dashboard');

		}


		$this->data['page_title'] = 'Edit User';

		$this->data['menu'] = 'users';

		$this->data['submenu'] = 'add';

		$this->data['action'] = 'edit';

		

		$row = $this->common->get('users', array( 'id' => $id ), 'array');

		

		if( is_array($row) && count($row) == 0 ) {

			redirect('dashboard');

		}



		$this->data['row'] = $row;

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check['.$id.']');

		$this->form_validation->set_rules('first_name', 'First name', 'trim|required');

		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


		if($_POST) {

			

			if( $_POST['password'] != '' ) {

				$this->form_validation->set_rules('password', 'Password', 'trim|min_length[4]');

			}

			if( $this->form_validation->run() == false ){

				

				$this->data['row'] = array_merge( $this->data['row'], $_POST );

				

			} else {

				

				$data_arr = array(

					'group_id' => $this->input->post('group_id'),

					'email'=> trim($this->input->post('email')),

					'first_name'=> trim($this->input->post('first_name')),

					'last_name' => trim($this->input->post('last_name')),

					'phone' => trim($this->input->post('phone')),

					'is_active' => $this->input->post('is_active'),

				);

				

				if( $_POST['password'] != '' ) {

					$data_arr['password'] = md5($this->config->item('encryption_key').trim($this->input->post('password')));

				}

				

				$config['upload_path'] = './files/profile/';

				$config['encrypt_name'] = TRUE;

				$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';

				$this->load->library('upload', $config);

				if ( $this->upload->do_upload('image') ){ 

					$data = array('upload_data' => $this->upload->data());

					$data_arr['image'] = $data['upload_data']['file_name'];

					

					if( !file_exists( getcwd().'/files/profile/'.$id ) ) {

						mkdir( getcwd().'/files/profile/'.$id );

					}

					

					rename( getcwd().'/files/profile/'.$data['upload_data']['file_name'], getcwd().'/files/profile/'.$id.'/'.$data['upload_data']['file_name'] );



					$old_path = $new_path = getcwd().'/files/profile/'.$id.'/'.$data['upload_data']['file_name'];

					$this->image_thumb( $old_path, $new_path );

				} 

				

				$this->common->update('users',$data_arr, array('id' => $id ));

				$this->session->set_flashdata('msg','Saved!');

				redirect('users/edit/'.encrypt($id));

			}

		}



		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('users/edit_form',$this->data);
		$this->load->view('templates/footer',$this->data);

	}



	public function delete( $user_salt_id = 0 ) {

		

		if( $user_salt_id == '0' ) {

			redirect('dashboard');

		}

		$user_id = decrypt($user_salt_id)*1;

		if( !is_int($user_id) || !$user_id ) {

			redirect('dashboard');

		}

		

		$this->common->delete( 'users', array( 'id' =>  $user_id ) );

		$this->session->set_flashdata('msg','User deleted successfully');

		redirect('users');

	}



	public function email_check( $email, $id ) {

		

		$count = $this->common->get_total_count( 'users', array('lower(email)' => strtolower($email), 'id <>' => $id ));

		if ( $count > 0 ){

			$this->form_validation->set_message('email_check', 'This email already exists, please try another one.');

			return FALSE;

		} else {

			return TRUE;

		}

	}

	

	public function image_thumb( $old_path = '', $new_path = '' ) {

		  // basic info

		ini_set('memory_limit', '1024M'); 

        $pathinfo = pathinfo($old_path);

        $original = $old_path;

        // original image not found, show 404

        if (!file_exists($original)) {

            show_404($original);

        }

		

        $width = 400; 
		$height = 400;

        // only continue with a valid width and height

        if ( $width >= 0 && $height >= 0) {

            // initialize library

            $config["source_image"] = $old_path;
            $config['new_image'] = $new_path;
            $config["width"] = $width;
            $config["height"] = $height;
            $config["dynamic_output"] = FALSE; // always save as cache

            

            $this->load->library('image_lib');
			$this->image_lib->initialize($config);
            // $this->image_lib->fit();
			$this->image_lib->clear();

        }

	}

}