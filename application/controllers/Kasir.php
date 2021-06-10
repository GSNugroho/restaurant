<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        if((!empty($_SESSION['masuk']) && !empty($_SESSION['akses']))){
            $this->load->model('M_bersih');
            $this->load->model('M_kategori');
            $this->load->model('M_produk');
            $this->load->model('M_kasir');
        }else{
			echo redirect('Welcome');
		}
    }

    public function index(){
        $data = array(
            'kategori' => $this->M_kategori->get_semua_kategori(),
            'produk' => $this->M_produk->get_semua_produk_jual()
        );
        $this->load->view('kasir/kasir_dashboard', $data);
    }

    public function order(){
        $this->load->view('kasir/kasir_order');
    }

    public function pengeluaran(){
        $this->load->view('kasir/kasir_pengeluaran');
    }

    public function tambah_pengeluaran(){
        $data = array(
            'produk' => $this->M_bersih->get_semua_stok_kotor()
        );
        $this->load->view('kasir/kasir_tambah_pengeluaran', $data);
    }

    function tbl_order(){
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

        if($this->input->post('searchCari') != ''){
            $nama = $this->input->post('searchCari');
            $searchQuery .= " AND tbl_order.order_nm_pemesan LIKE '%$nama%' ";
        }

		## Total number of records without filtering
		$records = $this->M_kasir->get_all_order();
		foreach($records->result_array() as $row){
			$totalRecords = $row['allcount'];
		}
		

		## Total number of record with filtering
		$records = $this->M_kasir->get_all_order_search($searchQuery);
		foreach($records->result_array() as $row){
			$totalRecordwithFilter = $row['allcount'];
		}
		

		## Fetch records
        $empQuery = $this->M_kasir->get_fetch_order($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
	    $data = array();

	    foreach($empQuery->result_array() as $row){
            $cek = '<button value="'.$row['order_id'].'" type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-default" data-whatever="'.$row['order_id'].'">
                Detail
            </button>';

            $data[] = array( 
                "order_dt_create"=>$row['order_dt_create'],
                "order_id"=>$row['order_id'],
                "order_nm_pemesan"=>$row['order_nm_pemesan'],
                "cek"=>$cek,
                "order_selesai"=>$row['order_selesai']
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

    function get_order_masuk_data(){
        $id = $this->input->get('id', true);
        $data = array(
            'order' => $this->M_kasir->get_data_order_masuk($id),
            'detail_order' => $this->M_kasir->get_detail_order_masuk($id)
        );

        echo json_encode($data);
    }

    function tambah_pengeluaran_baru(){
        $data = array(
            'stok_in_id' => $this->get_kode_stok_in_bersih(),
            'stok_in_dt_masuk' => date('Y-m-d', strtotime($this->input->post('tgl_stok_in', true))),
            'stok_in_dt_create' => date('Y-m-d H:i:s'),
            'stok_in_user_create' => $this->session->userdata('nama'),
            'stok_in_aktif' => 1
        );

        $produk_nm = $this->input->post('produk_nm', true);
        $produk_jml = $this->input->post('produk_jml', true);
        $produk_harga = $this->input->post('produk_harga', true);

        $produk_data = array();

        $index = 0;
        foreach($produk_nm as $data_nm){
            array_push($produk_data, array(
                'stok_in_detail_id' => $this->get_kode_stok_in_bersih(),
                'stok_in_detail_produk_id' => $data_nm,
                'stok_in_detail_jumlah' => $produk_jml[$index],
                'stok_in_detail_harga' => $produk_harga[$index]
            ));

            $index++;
        }

        $this->M_bersih->insert_batch_produk_stok_in($produk_data);

        $this->M_bersih->insert_stok_in($data);

        redirect('Bersih/stok_in');
    }

    function get_kode_stok_in_bersih(){
		$kode = $this->M_bersih->get_kode_stok_in_bersih();
        foreach($kode->result_array() as $row){
            $data = $row['maxkode'];
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "IB-";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
	}
}
?>