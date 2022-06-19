<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Departments extends My_Controller {

    public function __construct() {
        parent::__construct();
        if( !$this->session->userdata('logged_in') ) {
            redirect('login');
        }
        $this->common->check_user_exists();
    }

    public function index() {


        $this->data['page_title'] = 'Departments';
        $this->data['menu'] = 'masters';
        $this->data['submenu'] = 'departments';

        $this->data['js_files'] = [
            base_url('assets/pages/js/departments.js?ver=1.0.1'),
        ];



        $this->data["result"] = $this->common->get_all('departments');


        $this->load->view('templates/header',$this->data);
        $this->load->view('templates/sidebar',$this->data);
        $this->load->view('departments/index',$this->data);
        $this->load->view('templates/footer',$this->data);

    }

    public function create() {


        if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

            redirect('dashboard');

        }

        $this->data['page_title'] = 'New Departments';
        $this->data['menu'] = 'masters';
        $this->data['submenu'] = 'departments';
        $this->data['action'] = 'add';


        $this->data['row'] = array(

            'name'=>'',

        );

        $this->form_validation->set_message('required', '%s is required.');

        $this->form_validation->set_rules('name', 'Department Name', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($_POST) {

            if( $this->form_validation->run() == false ){

                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {

                $data_arr = array(
                    'name'=>trim($this->input->post('name')),

                );

                $this->common->insert( 'departments', $data_arr );

                $this->session->set_flashdata('msg','Saved!');

                redirect('departments');

            }

        }

        $this->load->view('templates/header',$this->data);
        $this->load->view('templates/sidebar',$this->data);
        $this->load->view('departments/form',$this->data);
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


        $this->common->delete( 'event_cat', ['id' =>  $id ] );



        $this->session->set_flashdata('msg','Event category deleted successfully');

        redirect('event_cat');

    }

}