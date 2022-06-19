<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends My_Controller {
	
	public function __construct() {
		parent::__construct();
		
		if( !$this->session->userdata('logged_in') || $this->session->userdata('group_id') != 1 ) {
			redirect('login');
		}
		$this->common->check_user_exists();
	}
	
	public function index() {
		
		$this->data['page_title'] = 'Settings';
		$this->data['menu'] = 'settings';
		$this->data['submenu'] = 'email';
		
		$this->data['js_files'] = array(
			base_url('assets/pages/js/general_settings.js?ver=1.0.0'),
		);
		
		$this->data['settings'] = $this->common->get( "core" );

		
		
		if($_POST) {
			
			$_POST['is_smtp'] = isset($_POST['is_smtp'])? 1 : 0;
			
			$config['upload_path'] = './files/media/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_width']  = '2000';
			$config['max_height']  = '2000';
			$this->load->library('upload', $config);
			
			if ( $this->upload->do_upload('logo') ) {
				$data = array('upload_data' => $this->upload->data());
				$_POST['logo'] = $data['upload_data']['file_name'];
			}
			
			if ( $this->upload->do_upload("header_logo") ) {
                $data = array('upload_data' => $this->upload->data());
                $_POST['header_logo'] = $data['upload_data']['file_name'];
            }

            if ( $this->upload->do_upload("banner_logo") ) {
                $data = array('upload_data' => $this->upload->data());
                $_POST['banner_logo'] = $data['upload_data']['file_name'];
            }

            if ( $this->upload->do_upload("ad_banner_1") ) {
                $data = array('upload_data' => $this->upload->data());
                $_POST['ad_banner_1'] = $data['upload_data']['file_name'];
            }
            if ( $this->upload->do_upload("ad_banner_2") ) {
                $data = array('upload_data' => $this->upload->data());
                $_POST['ad_banner_2'] = $data['upload_data']['file_name'];
            }
            if ( $this->upload->do_upload("ad_banner_3") ) {
                $data = array('upload_data' => $this->upload->data());
                $_POST['ad_banner_3'] = $data['upload_data']['file_name'];
            }

			
			$this->common->update('core', $_POST );
			$this->session->set_flashdata('msg','Settings updated successfully!');
			redirect('settings');
		}
		
		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('settings/index',$this->data);
		$this->load->view('templates/footer',$this->data);
	}

	public function backup() {
		
		$this->data['page_title'] = 'Settings';
		$this->data['menu'] = 'settings';
		$this->data['submenu'] = 'backup';
		
		$this->load->helper('file');
		$this->data['backups'] = get_filenames('./files/backup/');
		
		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('settings/backup',$this->data);
		$this->load->view('templates/footer',$this->data);
	}
	
	public function mysql_backup(){
		
		$this->load->helper('file');
		$this->load->dbutil();
		$prefs = array('format' => 'zip', 'filename' => 'Database-full-backup_'.date('Y-m-d_H-i'));

		$backup = $this->dbutil->backup($prefs); 

		if ( ! write_file('./files/backup/Database-full-backup_'.date('Y-m-d_H-i').'.zip', $backup)) {
			$this->session->set_flashdata('error', 'Could not create backup file!');
		} else { 
			$this->session->set_flashdata('success', 'Backup has been created!'); 
		}
 		
 		redirect('settings/backup');
		
	}
	
	public function mysql_download($filename){
		
		$this->load->helper('file');
		$this->load->helper('download');

		$file = './files/backup/'.$filename;
		$mime = get_mime_by_extension($file);

		if(file_exists($file)) {

			header('Content-Description: File Transfer');
            header('Content-Type: '.$mime);
            header('Content-Disposition: attachment; filename='.basename($filename));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            //ob_clean();
            flush();
            exit; 
        }
 		redirect('settings/backup');
	}  
	
	public function templates() {
		
		$this->data['page_title'] = 'Email Templates';
		$this->data['menu'] = 'settings';
		$this->data['submenu'] = 'emails';
		
		$this->data["result"] = $this->common->get_all('emails', '', 'SQL_CALC_FOUND_ROWS *', '', 30, $this->uri->segment(4));
		$total = $this->common->get_search_count();
		$config['base_url'] = site_url('settings/emails/page/');
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
		$this->load->view('settings/emails',$this->data);
		$this->load->view('templates/footer',$this->data);
	}
	
	public function edit_template( $id = 0 ) {
		
		$this->data['page_title'] = 'Email Templates';
		$this->data['menu'] = 'settings';
		$this->data['submenu'] = 'emails';
		
		$this->data['js_files'] = array(
			base_url('assets/global/plugins/ckeditor/ckeditor.js'),
			base_url('assets/pages/js/template.js?ver=1.0.0'),
		);
		
		$row = $this->common->get('emails', array( 'id' => $id ), 'array');
		$this->data['row'] = $row;
		
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('body', 'Body', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		
		if($_POST) {
			
			if( $this->form_validation->run() == false ){
				
				$this->data['row'] = array_merge( $this->data['row'], $_POST );
				
			} else {
				
				$this->data_arr = array(
					'subject' => trim($this->input->post('subject')),
					'body' => $this->input->post('body'),
				);
				
				$this->common->update('emails',$this->data_arr, array('id' => $id ));
				
				$this->session->set_flashdata('msg','Template <a href="'.site_url('settings/edit_template/'.$id).'">'.trim($this->input->post('subject')).'</a> updated successfully!');
				
				redirect('settings/templates');
			}
		}
		
		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('settings/template',$this->data);
		$this->load->view('templates/footer',$this->data);
	}

	public function testemail() {
		$to_email = trim($this->input->post('email'));
		$settings = $this->core_settings;
		$this->load->library('phpmailer');
		$this->phpmailer->IsHTML(true);
		$is_smtp = $settings->is_smtp;
		
		if( $is_smtp == 1 ) {
			$this->phpmailer->IsSMTP(); 
			$this->phpmailer->SMTPSecure = $settings->connection_prefix;
			$this->phpmailer->SMTPAuth   = true;                  
			$this->phpmailer->Host       = $settings->smtp_host;
			$this->phpmailer->Port       = $settings->smtp_port;        
			$this->phpmailer->Username   = $settings->smtp_username; 
			$this->phpmailer->Password   = $settings->smtp_password;
		}

		$this->phpmailer->SetFrom( $settings->email, $settings->site_name );
		$this->phpmailer->AddAddress( $to_email );
		$this->phpmailer->Subject = 'Test Email';
		$this->phpmailer->Body = '<p>This is a test email</p>';

		if( $this->phpmailer->Send() ) {
			
			$this->phpmailer->ClearAddresses();

			$response = array(
				'html' => '<div class="alert alert-success">Email sent successfully!</div>',
			);
			
		} else {
			
			$response = array(
				'html' => '<div class="alert alert-danger">Email not sent!</div>',
			);
		}
		
		header('Content-type: application/json');   
		echo json_encode( $response );

		
		
	}
}