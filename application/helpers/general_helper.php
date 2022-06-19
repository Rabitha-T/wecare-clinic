<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if( !function_exists('create_slug') ) {

	function create_slug($name, $id=''){
	    $count = 0;
	    $name = url_title($name);
	    $slug_name = $name;
	    $slug_name = strtolower(trim($slug_name, '-'));
//	    while(true)
//	    {
//	    	$ci = &get_instance();
//	        $ci->db->select('id');
//	        if($id !=''){
//	        	$ci->db->where('id !=', $id);
//	        }
//	        $ci->db->where('slug', $slug_name);   // Test temp name
//            $query = $ci->db->get('service_item');
//	        if ($query->num_rows() == 0) break;
//	        $slug_name = $slug_name . '-' . (++$count);
//	         // Recreate new temp name
//	    }
	    return $slug_name;      // Return temp name   
	}
}


if( !function_exists('random_string') ) {
	function random_string($stirng = 15){  //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
		
		$rnd_id = password_hash(uniqid(rand(),1), PASSWORD_DEFAULT);
		$rnd_id = strip_tags(stripslashes($rnd_id)); 
		$rnd_id = str_replace(".","",$rnd_id); 
		$rnd_id = strrev(str_replace("/","",$rnd_id)); 
		$rnd_id = substr($rnd_id,0,$stirng); 
		return $rnd_id;
	}
}

if ( !function_exists('username') ) {
	function username( $id = 0 ) {
		
		if( $id > 0 ) {
			$ci = &get_instance();
			$ci->db->select('username');
			$ci->db->where( 'id' , $id );
			$row = $ci->db->get('users')->row();
			if( is_array($row) && count($row) > 0 ) {
				return $row->username;
			} else {
				return '';
			}
		} else {
			return '';
		}
	}
}

if ( !function_exists('user_details') ) {
	function user_details( $id = 0 ) {
		$ci = &get_instance();
		$ci->db->where( 'id' , $id );
		$row = $ci->db->get('users')->row();
		return $row;
	}
}

if( !function_exists('get_settings_item') ) {
	
	function get_settings_item($key = '') {
		
		$ci = &get_instance();
		$ci->db->where('field', $key);
		$row = $ci->db->get('settings')->row();
		if( is_array($row) && count($row) > 0 ) {
			return $row->value;
		} else {
			return '';
		}
	}
	
}

if( !function_exists('get_role_name') ) {
	
	function get_role_name( $id = '' ) {
		
		$ci = &get_instance();
		$ci->db->where('id', $id);
		$row = $ci->db->get('groups')->row();

		if( $row ) {

  			return $row->title;

		} else {
			return '';
		}
	}
	
}

if( !function_exists('is_user_active') ) {
	function is_user_active( $id = 0 ) {
		$ci = &get_instance();
		$ci->db->where( 'id' , $id );
		$row = $ci->db->get('users')->row();
		
		if( is_array($row) && count($row) > 0 ) {
			
			if( $row->expire_date < time() ) {
				return false;
			} else {
				return true;
			}
			
		} else {
			return false;
		}
	}
}

if ( !function_exists('get_user_status') ) {
	function get_user_status( $key  = 0) {
		$st_arr = array(
			1 => 'Active',
			2 => 'Inactive',
			3 => 'Deleted',
		);
		return $st_arr[$key];
	}
}

if ( !function_exists('get_user_status_class') ) {
	function get_user_status_class( $key  = 0) {
		$st_arr = array(
			1 => 'success',
			2 => 'warning',
			3 => 'danger',
		);
		return $st_arr[$key];
	}
}


if ( !function_exists('send_mail') ) {
	function send_mail( $name, $user_id = 0, $params = array() ){
		
		$ci = &get_instance();
		
		$settings = $ci->db->get('core')->row();
		
		$to_name = $to_email = '';
		if (false !== ($pos = strpos($user_id, '@'))) {
			$to_email = $user_id;
			if( $to_email == '' ) {
				return;
			}
		} else {
			
			$ci->db->where( 'id' , $user_id );
			$user = $ci->db->get('users')->row();
			
			if( is_array($user) && count($user) == 0 ){
				return;
			}
			$to_name = $user->first_name.' '.$user->last_name;
			$to_email = $user->email;
		}
		
		$ci->db->where( 'slug' , $name );
		$model = $ci->db->get('emails')->row();
		
		if( is_array($model) && count($model) == 0 ){
			return;
		}
		
		$template = $model->body;
		$subject = $model->subject;
		
		$template = str_replace(array_map(function($key) {
			return '[*' . $key . '*]';
		}, array_keys($params)), array_values($params), $template);

		$subject = str_replace(array_map(function($key) {
			return '[*' . $key . '*]';
		}, array_keys($params)), array_values($params), $subject);

		
		$ci->load->library('phpmailer');
		
		$ci->phpmailer->IsHTML(true);
		
		$is_smtp = $settings->is_smtp;
		
		if( $is_smtp == 1 ) {
			$ci->phpmailer->IsSMTP(); 
			$ci->phpmailer->SMTPSecure = $settings->connection_prefix;
			$ci->phpmailer->SMTPAuth   = true;                  
			$ci->phpmailer->Host       = $settings->smtp_host;
			$ci->phpmailer->Port       = $settings->smtp_port;        
			$ci->phpmailer->Username   = $settings->smtp_username; 
			$ci->phpmailer->Password   = $settings->smtp_password;
		}
		
		

		$ci->phpmailer->SetFrom( $settings->email, $settings->site_name );
		$ci->phpmailer->AddAddress( $to_email, $to_name );
		$ci->phpmailer->Subject = $subject;
		$ci->phpmailer->Body = $template;
		$ci->phpmailer->Send();
		$ci->phpmailer->ClearAddresses();
	}
}

if ( !function_exists('send_mail_vendor') ) {
    function send_mail_vendor( $name, $user_id = 0, $params = array() ){

        $ci = &get_instance();

        $settings = $ci->db->get('core')->row();

        $to_name = $to_email = '';
        if (false !== ($pos = strpos($user_id, '@'))) {
            $to_email = $user_id;
            if( $to_email == '' ) {
                return;
            }
        } else {

            $ci->db->where( 'id' , $user_id );
            $user = $ci->db->get('vendors')->row();

            if( is_array($user) && count($user) == 0 ){
                return;
            }
            $to_name = $user->name;
            $to_email = $user->email;
        }

        $ci->db->where( 'slug' , $name );
        $model = $ci->db->get('emails')->row();

        if( is_array($model) && count($model) == 0 ){
            return;
        }

        $template = $model->body;
        $subject = $model->subject;

        $template = str_replace(array_map(function($key) {
            return '[*' . $key . '*]';
        }, array_keys($params)), array_values($params), $template);

        $subject = str_replace(array_map(function($key) {
            return '[*' . $key . '*]';
        }, array_keys($params)), array_values($params), $subject);


        $ci->load->library('phpmailer');

        $ci->phpmailer->IsHTML(true);

        $is_smtp = $settings->is_smtp;

        if( $is_smtp == 1 ) {
            $ci->phpmailer->IsSMTP();
            $ci->phpmailer->SMTPSecure = $settings->connection_prefix;
            $ci->phpmailer->SMTPAuth   = true;
            $ci->phpmailer->Host       = $settings->smtp_host;
            $ci->phpmailer->Port       = $settings->smtp_port;
            $ci->phpmailer->Username   = $settings->smtp_username;
            $ci->phpmailer->Password   = $settings->smtp_password;
        }



        $ci->phpmailer->SetFrom( $settings->email, $settings->site_name );
        $ci->phpmailer->AddAddress( $to_email, $to_name );
        $ci->phpmailer->Subject = $subject;
        $ci->phpmailer->Body = $template;
        $ci->phpmailer->Send();
        $ci->phpmailer->ClearAddresses();
    }
}




if( !function_exists('is_mobile') ) {

    function is_mobile(){

        $useragent=$_SERVER['HTTP_USER_AGENT'];

        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){

            return true;

        }else{

            return false;

        }

    }
}



















