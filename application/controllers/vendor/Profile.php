<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends My_Controller {

	

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
		$this->data['current_page'] = 'profile';

        $this->data['js_files'] = [
            base_url('assets/pages/js/vendor/profile.js?ver=1.0.1'),
        ];

        $left_join = [

            'departments d' =>'d.id = v.department_id'
        ];


        $this->data['row'] = $this->common->get('vendors v',['v.id' => $this->vendor->id ],'object',
            'v.*, d.name department', $left_join);


		$this->load->view( 'vendor/templates/header', $this->data );
		$this->load->view( 'vendor/profile/index', $this->data );
		$this->load->view( 'vendor/templates/footer', $this->data );

	}

    public function edit() {


        $this->data['page_title'] = 'Dashboard';
        $this->data['menu'] = 'dashboard';
        $this->data['submenu'] = '';
        $this->data['current_page'] = 'profile';

        $this->data['css_files'] = [
            base_url('assets/global/plugins/dropzone/dist/min/dropzone.min.css'),
        ];

        $this->data['js_files'] = [
            base_url('assets/global/plugins/dropzone/dist/min/dropzone.min.js'),
            base_url('assets/pages/js/vendor/edit_profile.js?ver=1.0.1'),
        ];



        $this->data['row'] = $this->common->get('vendors',['id' => $this->vendor->id ], 'array' );



        if ( isset($_POST['user_password']) ) {

            $this->data['tab'] = 'password';

            $this->form_validation->set_rules('new_password', 'New password', 'trim|required');
            $this->form_validation->set_rules('password', 'Old Password', 'trim|required');

            $this->form_validation->set_rules('retype_new_password', 'Retype new password', 'trim|required');



            if( $this->form_validation->run() == false ){

                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {


                $old_password = md5($this->config->item('encryption_key').trim($this->input->post('password')));
                $row_vendor = $this->common->get('vendors',['password' => $old_password]);

                if( $row_vendor ){

                    $new_password = md5($this->config->item('encryption_key').trim($this->input->post('new_password')));

                    $retype_new_password = md5($this->config->item('encryption_key').trim($this->input->post('retype_new_password')));



                    if ( $new_password != $retype_new_password ){

                        $this->session->set_flashdata('error_msg','Passwords are not matching!');

                    } else {

                        $data_arr['password'] =  $new_password;

                        $this->common->update('vendors',$data_arr,
                            array('id' => $this->session->userdata('vendor_user_id') ));

                        $params = array(

                            'name' => $row_vendor->name,
                            'site_name' => $this->data['core_settings']->site_name,
                            'site_email' => $this->data['core_settings']->email,

                        );

                        send_mail_vendor('password-changed', $this->session->userdata('vendor_user_id'), $params);

                        $this->session->set_flashdata('msg','Password updated successfully!');

                        redirect('vendors-edit-profile');

                    }


                }else{

                    $this->session->set_flashdata('error_msg','Old password is not correct!');

                    redirect('vendors-edit-profile');

                }



            }
        }





        if ( isset($_POST['user_email']) ) {

            $this->data['tab'] = 'email';

            $this->form_validation->set_rules('new_email', 'New Email', 'trim|required');
            $this->form_validation->set_rules('confirm_new_email', 'Confirm New Email', 'trim|required');

            $this->form_validation->set_rules('old_email', 'Old Email', 'trim|required');



            if( $this->form_validation->run() == false ){

                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {


                $old_email = trim($this->input->post('old_email'));
                $row_vendor = $this->common->get('vendors',['email' => $old_email]);

                if( $row_vendor ){

                    $new_email= trim($this->input->post('new_email'));

                    $confirm_new_email = trim($this->input->post('confirm_new_email'));



                    if ( $new_email != $confirm_new_email ){

                        $this->session->set_flashdata('error_msg','Emails are not matching!');

                    } else {

                        $data_arr['email'] =  $new_email;

                        $this->common->update('vendors',$data_arr,
                            array('id' => $this->session->userdata('vendor_user_id') ));

                        $this->session->set_flashdata('msg','Email updated successfully!');

                        redirect('vendors-edit-profile');

                    }


                }else{

                    $this->session->set_flashdata('error_msg','Old email is not correct!');

                    redirect('vendors-edit-profile');

                }



            }
        }






        $this->data['arr_places'] = $this->common->get_all('departments','','','name asc');

        $this->load->view( 'vendor/templates/header', $this->data );
        $this->load->view( 'vendor/profile/edit', $this->data );
        $this->load->view( 'vendor/templates/footer', $this->data );

    }

    public function create_profile(){


        $data_arr = [

            'name' => trim($this->input->post('name')),
            'email' => $this->input->post('email'),
            'phone' => trim($this->input->post('phone')),
            'address' => trim($this->input->post('address')),
            'personal_info' => trim($this->input->post('personal_info')),
            'department_id' => trim($this->input->post('department_id')),
            'zip' => trim($this->input->post('zip')),
            'state' => trim($this->input->post('state')),
            'hospital_name' => trim($this->input->post('hospital_name')),

        ];

        $id = $this->input->post('id');


        $config['upload_path'] = './files/vendor_profile/';
        $config['encrypt_name'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|txt|doc|docx';

        $this->load->library('upload', $config);


        $this->common->update('vendors',$data_arr, array('id' => $id ));


        $sess_array_property_id = array(
            'property_id'       => $id,
        );
        $this->session->set_userdata($sess_array_property_id);

        $this->session->set_flashdata('msg','Saved!');

        header('Content-type: application/json');
        die(json_encode(
            ['status' => 'success',
                'id'=>$id,
            ]
        ));

    }


    public function create(){

        $row = $this->common->get( 'vendors','','object','','','','id desc' );
        $property_id = $row->id;
        $property_id = $this->session->userdata('property_id');

        if(!empty($_FILES)){

            // File path configuration
            $uploadDir = "uploads/";
            $uploadDirNew = "files/vendor_profile/.$property_id";

            if( !file_exists( getcwd().'/files/vendor_profile/'.$property_id ) ) {

                mkdir( getcwd().'/files/vendor_profile/'.$property_id );

            }

            $fileName = rand(111,999).basename($_FILES['file']['name']);
            $uploadFilePath = $uploadDir.$fileName;

            $extension =  pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            $fileName_new = rand(111,999).'_'.$property_id.'.'.$extension;

            // Upload file to server
            if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){
                // Insert file information in the database

                rename( getcwd().'/uploads/'.$fileName, getcwd().'/files/vendor_profile/'.$property_id.'/'.$fileName_new );

//                $this->AddWaterMark(getcwd().'/files/attractions/'.$property_id.'/'.$fileName_new,
//                    getcwd().'/assets/front_end/images/watermark1.png');

                $this->load->library('image_lib');

                $configer =  array(
                    'image_library'   => 'gd2',
                    'source_image'    =>  getcwd().'/files/vendor_profile/'.$property_id.'/'.$fileName_new,
                    'maintain_ratio'  =>  TRUE,
                    'width'           =>  640,
                    'height'          =>  480,
                );
                $this->image_lib->clear();
                $this->image_lib->initialize($configer);
                $this->image_lib->resize();


                $data_arr =[
                    'image'=>$fileName_new,
                ];
                $this->common->update('vendors',$data_arr, array('id' => $property_id ));

            }


        }

        $this->session->set_flashdata('msg','Profile Updated!');

    }



}