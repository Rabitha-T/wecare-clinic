<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index(){

        if ( $this->session->userdata('patient_logged_in') ) {
            redirect('/patient-dashboard');
        }

        $this->data['js_files'] =[

        ];


        $this->data['current_page'] = 'home';


        $this->data['error'] = '';

        $this->data["row"] = array(
            'name' => '',
            'email' => '',
            'phone' => '',
            'password' => '',
        );

        $this->data["type"] = 'login';

        if( isset($_POST['sign_up']) ){

            $this->data["type"] = 'register';

            $this->form_validation->set_message('required', '%s is required.');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[patients.email]',
                array('is_unique' => 'This email is already being used by someone.'));

            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
            $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');

            if( !$this->form_validation->run() ) {

                $this->data["row"] = array_merge( $this->data["row"], $_POST );

            } else {


                $user_arr = array(
                    'email'=> trim($this->input->post('email')),
                    'password'=> md5($this->config->item('encryption_key').trim($this->input->post('password'))),
                    'name'=> trim($this->input->post('name')),
                    'mobile' => trim($this->input->post('phone')),
                    'user_type' => 3,
                    'is_active' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                );

                $user_id = $this->common->insert( 'patients', $user_arr );


                $sess_array = array(
                    'username'       => trim($this->input->post('email')),
                    'email'          => trim($this->input->post('email')),
                    'patient_user_id'        => $user_id,
                    'patient_logged_in' => TRUE,
                    'group_id'       => 3,
                );
                $this->session->set_userdata($sess_array);

                $this->common->update('patients', array( 'last_login' => date('Y-m-d H:i:s') ),
                    array( 'id' => $user_id ) );

                redirect('patient-dashboard');
            }

        }



        if ( isset($_POST['sign_in']) ){

            $this->data["type"] = 'login';

            $email = trim($this->input->post('email'));

            $password = md5($this->config->item('encryption_key').trim($this->input->post('password')));


            if($email && $password){

                $user = $this->common->patient_login($email, $password);

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
                        'patient_user_id'        => $user->id,
                        'patient_logged_in' => TRUE,
                        'group_id'       => 3,
                    );
                    $this->session->set_userdata($sess_array);

                    $this->common->update('patients', array( 'last_login' => date('Y-m-d H:i:s') ), array( 'id' => $user->id ) );
                    redirect('patient-dashboard');

                } else {
                    $this->data['error'] = 'Invalid Email or Password';
                }

            } else {
                $this->data['error'] = 'Invalid Email or Password';
            }
        }



        $this->load->view('front_end/templates/header',$this->data);
        $this->load->view('front_end/home/index',$this->data);
        $this->load->view('front_end/templates/footer',$this->data);
    }

   public function dashboard(){


       if( $this->patient == false ) {

           redirect('home');

       }

       $this->data['current_page'] = 'home';

       $this->load->view('front_end/templates/header',$this->data);
       $this->load->view('front_end/home/dashboard',$this->data);
       $this->load->view('front_end/templates/footer',$this->data);


   }

    public function logout(){
        $this->session->sess_destroy();
        redirect('home');
    }


}
