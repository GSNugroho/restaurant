<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        if((!empty($_SESSION['masuk']) && !empty($_SESSION['akses']))){
            $this->load->model('M_administrator');
            $this->load->model('M_produk');
            $this->load->model('M_kategori');
        }else{
            $this->session->set_flashdata('error', 'Maaf, Anda Harus Login Dahulu');
			redirect('Welcome');
		}
    }

    public function index(){
        $this->load->view('administrator/admin_dasboard');
    }

    public function produk(){
        $data = array(
            'kategori' => $this->M_kategori->get_semua_kategori()
        );
        $this->load->view('administrator/admin_produk', $data);
    }

    public function stok(){
        $this->load->view('administrator/admin_stok');
    }

    public function stok_in(){
        $this->load->view('administrator/admin_stok_in');
    }

    public function stok_out(){
        $this->load->view('administrator/admin_stok_out');
    }

    public function laporan(){
        $this->load->view('administrator/laporan/admin_laporan');
    }

    public function akun(){
        $this->load->view('administrator/admin_akun');
    }

    function tambah_akun(){
        $this->load->view('administrator/admin_tambah_akun');
    }

    function tbl_user(){
        ## Read value
		$draw = $_POST['draw'];
		$baris = $_POST['start'];
		$rowperpage = $_POST['length']; // Rows display per page
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		$searchValue = $_POST['search']['value']; // Search value

		## Search 
        $searchQuery = '';
		if($searchValue != ''){
		$searchQuery .= " and (
		nm_mitra like '%".$searchValue."%' or  
		ats_nm_rekening like '%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$records = $this->M_administrator->get_all_user();
		foreach($records->result_array() as $row){
			$totalRecords = $row['allcount'];
		}
		

		## Total number of record with filtering
		$records = $this->M_administrator->get_all_user_search($searchQuery);
		foreach($records->result_array() as $row){
			$totalRecordwithFilter = $row['allcount'];
		}
		

		## Fetch records
        $empQuery = $this->M_administrator->get_fetch_user($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
	    $data = array();

	    foreach($empQuery->result_array() as $row){
		// while( $row = sqlsrv_fetch_array( $empQuery, SQLSRV_FETCH_ASSOC) ) {
            if($row['user_status'] == '1'){
                $user_status = 'Aktif';
            }else{
                $user_status = 'Tidak Aktif';
            }

            
            $data[] = array( 
                "user_id"=>$row['user_id'],
                "user_username"=>$row['user_username'],
                "user_nama"=>$row['user_nama'],
                "user_level"=>$row['user_level'],
                "user_status"=>$user_status
            );
		}

		## Response
		$response = array(
		"draw" => intval($draw),
		"iTotalRecords" => $totalRecords,
		"iTotalDisplayRecords" => $totalRecordwithFilter,
		"aaData" => $data
		);

		echo json_encode($response);
    }

    function tambah_akun_baru(){
        $data = array(
            'user_id' => $this->get_kode_user_id(),
            'user_nama' => $this->input->post('username_nama', true),
            'user_username' => $this->input->post('username', true),
            'user_password' => md5($this->input->post('username_pass', true)),
            'user_level' => $this->input->post('username_level', true),
            'user_status' => 1,
            'user_dt_create' => date('Y-m-d H:i:s'),
            'user_user_create' => $this->session->userdata('nama'),
        );

        $this->M_administrator->insert_akun_baru($data);

        redirect('Administrator/akun');
    }

    function get_kode_user_id(){
		$kode = $this->M_administrator->get_kode_user_id();
        foreach($kode->result_array() as $row){
            $data = $row['maxkode'];
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 2, 6);
        $noUrut++;
        $char = "UR";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
	}
}
?>