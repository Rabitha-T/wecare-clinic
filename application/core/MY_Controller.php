<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_Controller extends CI_Controller
{
    var $user = FALSE;
    var $core_settings = false;
    protected $data = array();

    function __construct() {
        parent::__construct();
        $this->core_settings = $this->data['core_settings'] = $this->common->get( 'core');
        $this->user = $this->session->userdata('user_id') ? $this->common->get( 'users', array( 'id' => $this->session->userdata('user_id'), 'is_active' => 1 ) ) : FALSE;
        $this->front_user = $this->session->userdata('user_user_id') ? $this->common->get( 'frontend_user', array( 'id' => $this->session->userdata('user_user_id'), 'is_active' => 1 ) ) : FALSE;
        $this->vendor = $this->session->userdata('vendor_user_id') ? $this->common->get( 'vendors', array( 'id' => $this->session->userdata('vendor_user_id') ) ) : FALSE;
        $this->patient = $this->session->userdata('patient_user_id') ? $this->common->get( 'patients', array( 'id' => $this->session->userdata('patient_user_id') ) ) : FALSE;


    }
}
