<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
        parent:: __construct();
        $this->load->model('M_welcome');
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function cek_user(){
		$username=strip_tags(stripslashes($this->input->post('username',TRUE)));
        $password=strip_tags(stripslashes($this->input->post('password',TRUE)));

        $cek = $this->M_welcome->cek_login($username, $password);
        if($cek->num_rows() > 0){
        	$this->session->set_userdata('masuk',true);
         	$this->session->set_userdata('user',$username);

         	$xcadmin = $cek->row_array();

			 switch($xcadmin['user_level']){
				 	case '1':
						$this->session->set_userdata('akses', '1');
						$id_admin = $xcadmin['user_id'];
						$user_nama = $xcadmin['user_nama'];
						$this->session->set_userdata('id_admin', $id_admin);
						$this->session->set_userdata('nama', $user_nama);
					break;
					case '2':
						$this->session->set_userdata('akses', '2');
						$id_admin = $xcadmin['user_id'];
						$user_nama = $xcadmin['user_nama'];
						$this->session->set_userdata('id_admin', $id_admin);
						$this->session->set_userdata('nama', $user_nama);
					break;
					case '10':
						$this->session->set_userdata('akses', '10');
						$id_admin = $xcadmin['user_id'];
						$user_nama = $xcadmin['user_nama'];
						$this->session->set_userdata('id_admin', $id_admin);
						$this->session->set_userdata('nama', $user_nama);
					break;
					case '11':
						$this->session->set_userdata('akses', '11');
						$id_admin = $xcadmin['user_id'];
						$user_nama = $xcadmin['user_nama'];
						$this->session->set_userdata('id_admin', $id_admin);
						$this->session->set_userdata('nama', $user_nama);
					break;
					case '12':
						$this->session->set_userdata('akses', '12');
						$id_admin = $xcadmin['user_id'];
						$user_nama = $xcadmin['user_nama'];
						$this->session->set_userdata('id_admin', $id_admin);
						$this->session->set_userdata('nama', $user_nama);
					break;
			 }
        }
        if(($this->session->userdata('masuk') == true) && ($this->session->userdata('akses') == 1)){
            redirect('Welcome/berhasillogin');
        }else if(($this->session->userdata('masuk') == true) && ($this->session->userdata('akses') == 10)){
			redirect('Welcome/berhasillogin_kotor');
		}else if(($this->session->userdata('masuk') == true) && ($this->session->userdata('akses') == 11)){
			redirect('Welcome/berhasillogin_bersih');
		}else if($this->session->userdata('masuk') == true){
			redirect('Welcome/berhasillogin_kasir');
		}else{
            redirect('Welcome/gagallogin');
        }
	}

	function berhasillogin(){
		redirect('Administrator');
	}

	function berhasillogin_kotor(){
		redirect('Administrator/produk');
	}

	function berhasillogin_bersih(){
		redirect('Bersih/order');
	}

	function berhasillogin_kasir(){
		redirect('Kasir');
	}

	function gagallogin(){
		// $url=base_url('Welcome');
		$this->session->set_flashdata('error','Username Atau Password Salah');
		redirect($this->redirect);
	}
	
	function logout(){
		$this->session->sess_destroy();
		$url=base_url('Welcome');
		redirect($url);
	}
}
