<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Symptoms extends My_Controller {

    public function __construct() {
        parent::__construct();
        if( !$this->session->userdata('logged_in') ) {
            redirect('login');
        }
        $this->common->check_user_exists();
    }

    public function index() {


        $this->data['page_title'] = 'Symptoms';
        $this->data['menu'] = 'masters';
        $this->data['submenu'] = 'symptoms';

        $this->data['js_files'] = [
            base_url('assets/pages/js/symptoms.js?ver=1.0.1'),
        ];

        $left =[
            'departments d'=>'d.id = s.department_id'
        ];

        $this->data["result"] = $this->common->get_all('symptoms s','','s.*,d.name department','','','',$left);


        $this->load->view('templates/header',$this->data);
        $this->load->view('templates/sidebar',$this->data);
        $this->load->view('symptoms/index',$this->data);
        $this->load->view('templates/footer',$this->data);

    }

    public function create() {


        if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

            redirect('dashboard');

        }

        $this->data['page_title'] = 'New Symptoms';
        $this->data['menu'] = 'masters';
        $this->data['submenu'] = 'symptoms';
        $this->data['action'] = 'add';


        $this->data['row'] = array(

            'name'=>'',
            'department_id'=>'',

        );

        $this->data['arr_departments'] = $this->common->get_all('departments');

        $this->form_validation->set_message('required', '%s is required.');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('department_id', 'Department', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($_POST) {

            if( $this->form_validation->run() == false ){

                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {

                $data_arr = array(
                    'name'=>trim($this->input->post('name')),
                    'department_id'=>trim($this->input->post('department_id')),

                );

                $this->common->insert( 'symptoms', $data_arr );

                $this->session->set_flashdata('msg','Saved!');

                redirect('symptoms');

            }

        }

        $this->load->view('templates/header',$this->data);
        $this->load->view('templates/sidebar',$this->data);
        $this->load->view('symptoms/form',$this->data);
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

        $this->data['page_title'] = 'Edit Symptoms';
        $this->data['menu'] = 'masters';
        $this->data['submenu'] = 'symptoms';

        $row = $this->common->get('symptoms', array( 'id' => $id ), 'array');

        if( is_array($row) && count($row) == 0 ) {

            redirect('dashboard');

        }

        $this->data['row'] = $row;

        $this->data['arr_departments'] = $this->common->get_all('departments');

        $this->form_validation->set_message('required', '%s is required.');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('department_id', 'Department', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($_POST) {

            if( $this->form_validation->run() == false ){

                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {

                $data_arr = array(
                    'name'=>trim($this->input->post('name')),
                    'department_id'=>trim($this->input->post('department_id')),

                );

                $this->common->update('symptoms',$data_arr, array('id' => $id ));

                $this->session->set_flashdata('msg','Saved!');

                redirect('symptoms');

            }

        }


        $this->load->view('templates/header',$this->data);
        $this->load->view('templates/sidebar',$this->data);
        $this->load->view('symptoms/edit_form',$this->data);
        $this->load->view('templates/footer',$this->data);

    }





    public function delete( $id = 0 ) {

        if( $id == '0' ) {

            redirect('dashboard');

        }

        $id = decrypt($id)*1;

        if( !is_int($id) || !$id ) {

            redirect('dashboard');

        }


        $this->common->delete( 'symptoms', ['id' =>  $id ] );



        $this->session->set_flashdata('msg','Symptoms deleted successfully');

        redirect('symptoms');

    }

}