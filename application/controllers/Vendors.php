<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vendors extends My_Controller {

    public function __construct() {
        parent::__construct();
        if( !$this->session->userdata('logged_in') ) {
            redirect('login');
        }
        $this->common->check_user_exists();
    }

    public function index() {


        $this->data['page_title'] = 'Users';
        $this->data['menu'] = 'vendors';

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
            base_url('assets/pages/js/vendors.js?ver=1.0.1'),
        );



        $this->load->view('templates/header',$this->data);
        $this->load->view('templates/sidebar',$this->data);
        $this->load->view('vendors/index',$this->data);
        $this->load->view('templates/footer',$this->data);

    }

    public function get_all(){

        $keyword = '';
        if( isset( $_REQUEST['search']['value'] ) && $_REQUEST['search']['value'] != '' ) {
            $keyword = $_REQUEST['search']['value'];
        }

        $condition = '1=1';

        if( $keyword != '' ) {
            $condition .= ' AND (f.name LIKE "%'.$keyword.'%")';
        }



        if( isset($_REQUEST['user_name']) && $_REQUEST['user_name'] ) {
            $condition .= ' AND (f. name LIKE "%'.$_REQUEST['user_name'].'%")';
        }

        if( isset($_REQUEST['phone']) && $_REQUEST['phone'] ) {
            $condition .= ' AND (f. phone LIKE "%'.$_REQUEST['phone'].'%")';
        }

        if( isset($_REQUEST['created_at']) && $_REQUEST['created_at'] ) {
            $bDate = new DateTime( $_REQUEST['created_at'] );
            $created_at = $bDate->format('Y-m-d');
            $condition .= ' AND DATE_FORMAT(`f`.`created_at`,"%Y-%m-%d") = "'.$created_at.'"';

        }


        $iTotalRecords = $this->common->get_total_count('vendors f', $condition);

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
            2 => 'phone',
            3 => 'department_id',
            4 => 'is_approved',
            5 => 'created_at',
        );

        $left_join = [
            'departments d'=>'d.id = f.department_id'
        ];

        $order_by = $columns[$_REQUEST['order'][0]['column']];
        $order = $_REQUEST['order'][0]['dir'];
        $sort = $order_by.' '.$order;

        $result = $this->common->get_all( 'vendors f', $condition, 'f.*, d.name department',$sort, $limit,$offset,$left_join );


        foreach( $result as $row ) {

            if($row->is_approved ==1){

            $actions =  '
            <div class="center-block">
                <a class="btn btn-outline btn-circle btn-sm blue  view_form" href="javascript:;" data-url="'. site_url('vendors/view/'.encrypt($row->id)).'">
                <i class="fa fa-eye"></i> View </a>


           	</div>';

            }else{

                $actions =  '
            <div class="center-block">
                <a class="btn btn-outline btn-circle btn-sm red  approve" href="javascript:;" data-url="'. site_url('vendors/change_status/'.encrypt($row->id)).'">
                <i class="fa fa-check"></i> Approve </a>

                <a class="btn btn-outline btn-circle btn-sm blue  view_form" href="javascript:;" data-url="'. site_url('vendors/view/'.encrypt($row->id)).'">
                <i class="fa fa-eye"></i> View </a>
           	</div>';
            }

            $records["data"][] = [

                $row->name,
                $row->email,
                $row->phone,
                $row->department,
                ($row->is_approved ==1)?'Approved':'Pending',
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


    public function change_status($id =0 ){

        if( $id == '0' ) {

            redirect('dashboard');

        }

        $id = decrypt($id)*1;

        if( !is_int($id) || !$id ) {

            redirect('dashboard');

        }

        $data_arr =[
            'is_approved'=> 1
        ];

        $this->common->update('vendors',$data_arr,['id'=>$id]);

        header('Content-type: application/json');
        die(json_encode(
            ['status' => 'success']
        ));

    }

    public function view($id = 0){

        if( $id == '0' ) {

            redirect('dashboard');

        }

        $id = decrypt($id)*1;

        if( !is_int($id) || !$id ) {

            redirect('dashboard');

        }
        $join_arr_left = [
            'departments d' =>'d.id = p.department_id',
        ];


        $this->data['vendor'] = $this->common->get('vendors p',['p.id'=>$id],'object',
            'p.*,d.name place',$join_arr_left);

//        echo "<pre>"; print_r($this->data['row_property']); exit;




        $html = $this->load->view('vendors/view_form',$this->data,true );

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



}