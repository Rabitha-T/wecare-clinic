<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Front_users extends My_Controller {

    public function __construct() {
        parent::__construct();
        if( !$this->session->userdata('logged_in') ) {
            redirect('login');
        }
        $this->common->check_user_exists();
    }

    public function index() {


        $this->data['page_title'] = 'Users';
        $this->data['menu'] = 'front_users';

        $this->data['css_files'] = array(
            base_url('assets/global/plugins/datatables/datatables.min.css'),
            base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
            base_url('assets/global/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css'),
        );

        $this->data['js_files'] = array(
            base_url('assets/global/scripts/datatable.js'),
            base_url('assets/global/plugins/datatables/datatables.min.js'),
            base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
            base_url('assets/global/plugins/datetimepicker/moment/min/moment.min.js'),
            base_url('assets/global/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js'),
            base_url('assets/pages/js/front_users.js?ver=1.0.1'),
        );

        $this->data['arr_user_type']= get_user_type();

        $this->load->view('templates/header',$this->data);
        $this->load->view('templates/sidebar',$this->data);
        $this->load->view('front_users/index',$this->data);
        $this->load->view('templates/footer',$this->data);

    }

    public function get_all(){

        $keyword = '';
        if( isset( $_REQUEST['search']['value'] ) && $_REQUEST['search']['value'] != '' ) {
            $keyword = $_REQUEST['search']['value'];
        }

        $condition = '1=1 AND is_active = 1 ';

        if( $keyword != '' ) {
            $condition .= ' AND (f.name LIKE "%'.$keyword.'%")';
        }



        if( isset($_REQUEST['user_name']) && $_REQUEST['user_name'] ) {
            $condition .= ' AND (f. name LIKE "%'.$_REQUEST['user_name'].'%")';
        }

        if( isset($_REQUEST['phone']) && $_REQUEST['phone'] ) {
            $condition .= ' AND (f. mobile LIKE "%'.$_REQUEST['phone'].'%")';
        }

        if( isset($_REQUEST['created_at']) && $_REQUEST['created_at'] ) {
            $bDate = new DateTime( $_REQUEST['created_at'] );
            $created_at = $bDate->format('Y-m-d');
            $condition .= ' AND DATE_FORMAT(`f`.`created_at`,"%Y-%m-%d") = "'.$created_at.'"';

        }


        $iTotalRecords = $this->common->get_total_count('frontend_user f', $condition);

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);

        $records = array();
        $records["data"] = array();

        $limit = $iDisplayLength;
        $offset = $iDisplayStart;

        $columns = array(

            0 => 'name',
            1 => 'email',
            2 => 'mobile',
            3 => 'location',
            4 => 'is_active',
            5 => 'created_at',
        );

        $order_by = $columns[$_REQUEST['order'][0]['column']];
        $order = $_REQUEST['order'][0]['dir'];
        $sort = $order_by.' '.$order;

        $result = $this->common->get_all( 'frontend_user f', $condition, 'f.*',$sort, $limit,$offset );


        foreach( $result as $row ) {


            $actions =  '
            <div class="center-block">


                <a class="btn btn-outline btn-circle btn-sm blue  view_form" href="javascript:;" data-url="'. site_url('front_users/view/'.encrypt($row->id)).'">
                <i class="fa fa-eye"></i> View </a>

                <a class="btn btn-outline btn-circle btn-sm blue"  href="'. site_url('front_users/edit/'.encrypt($row->id)).'">
                <i class="fa fa-edit"></i> Edit </a>

                <a class="btn btn-outline btn-circle btn-sm blue  " href="'. site_url('front_users/delete/'.encrypt($row->id)).'">
                <i class="fa fa-trash"></i> Delete </a>



           	</div>';

            $records["data"][] = [

                $row->name,
                $row->email,
                $row->mobile,
                $row->location,
                ($row->is_active ==1)?'Active':'Inactive',
                date('M d, Y', strtotime($row->created_at)),
                $actions,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        header('Content-type: application/json');
        echo json_encode($records);
    }

    public function view($id = 0){

        if( $id == '0' ) {

            redirect('dashboard');

        }

        $id = decrypt($id)*1;

        if( !is_int($id) || !$id ) {

            redirect('dashboard');

        }

        $this->data['row'] = $this->common->get('frontend_user',['id'=>$id],'object');

        $html = $this->load->view('front_users/view_form',$this->data,true );



        header('Content-type: application/json');
        die(json_encode(
            ['status' => 'success',
                'html' => $html,
            ]
        ));
    }

    public function delete($id = 0){

        if( $id == '0' ) {

            redirect('dashboard');

        }

        $id = decrypt($id)*1;

        if( !is_int($id) || !$id ) {

            redirect('dashboard');

        }

        $this->common->update( 'frontend_user',['is_active'=>2], [ 'id' =>  $id ] );

        redirect('front_users');
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

        $this->data['menu'] = 'front_users';

        $this->data['submenu'] = 'add';

        $this->data['action'] = 'edit';



        $row = $this->common->get('frontend_user', array( 'id' => $id ), 'array');



        if( is_array($row) && count($row) == 0 ) {

            redirect('dashboard');

        }



        $this->data['row'] = $row;

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check['.$id.']');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($_POST) {



            if( $_POST['password'] != '' ) {

                $this->form_validation->set_rules('password', 'Password', 'trim|min_length[4]');

            }

            if( $this->form_validation->run() == false ){



                $this->data['row'] = array_merge( $this->data['row'], $_POST );



            } else {



                $data_arr = array(

                    'user_type' => $this->input->post('user_type'),

                    'email'=> trim($this->input->post('email')),

                    'name'=> trim($this->input->post('name')),
//                    'address'=> trim($this->input->post('address')),

                    'mobile' => trim($this->input->post('mobile')),


                );



                if( $_POST['password'] != '' ) {

                    $data_arr['password'] = md5($this->config->item('encryption_key').trim($this->input->post('password')));

                }









                $this->common->update('frontend_user',$data_arr, array('id' => $id ));

                $this->session->set_flashdata('msg','Saved!');

                redirect('front_users/edit/'.encrypt($id));

            }

        }



        $this->load->view('templates/header',$this->data);
        $this->load->view('templates/sidebar',$this->data);
        $this->load->view('front_users/edit_form',$this->data);
        $this->load->view('templates/footer',$this->data);

    }

    public function email_check( $email, $id ) {



        $count = $this->common->get_total_count( 'frontend_user', array('lower(email)' => strtolower($email), 'id <>' => $id ));

        if ( $count > 0 ){

            $this->form_validation->set_message('email_check', 'This email already exists, please try another one.');

            return FALSE;

        } else {

            return TRUE;

        }

    }

}