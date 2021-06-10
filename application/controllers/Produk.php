<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller{
    public function __construct(){
        parent:: __construct();
		if((!empty($_SESSION['masuk']) && !empty($_SESSION['akses']))){
			$this->load->library('session');
			$this->load->model('M_produk');
			$this->load->model('M_kategori');
		}else{
			echo redirect('Welcome');
		}
    }

    function tambah_produk(){
        $data = array(
            'kategori' => $this->M_kategori->get_semua_kategori()
        );
        $this->load->view('produk/produk_tambah_form', $data);
    }

	function tambah_stok(){
		$data = array(
            'produk' => $this->M_produk->get_semua_stok_kotor()
        );
		$this->load->view('produk/produk_tambah_stok_in', $data);
	}

	function kurang_stok(){
		$this->load->view('produk/produk_tambah_stok_keluar');
	}

    function tbl_produk(){
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

		$searchQuery .= " AND tbl_produk.produk_aktif = 1 ";

		if(($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '10')){
			$searchQuery .= "AND produk_level != '1' ";
		}
		
		if($this->input->post('searchKategori') != ''){
			$kategori = $this->input->post('searchKategori');
			$searchQuery .= " AND tbl_produk.produk_kategori = '$kategori' ";
		}

		if($this->input->post('searchJual') != ''){
			$jual = $this->input->post('searchJual');
			$searchQuery .= " AND tbl_produk.produk_jual = '$jual' ";
		}

		if($this->input->post('searchCari') != ''){
			$cari = $this->input->post('searchCari');
			$searchQuery .= " AND tbl_produk.produk_nama LIKE '%$cari%' ";
		}

		## Total number of records without filtering
		$records = $this->M_produk->get_all_produk();
		foreach($records->result_array() as $row){
			$totalRecords = $row['allcount'];
		}
		

		## Total number of record with filtering
		$records = $this->M_produk->get_all_produk_search($searchQuery);
		foreach($records->result_array() as $row){
			$totalRecordwithFilter = $row['allcount'];
		}
		

		## Fetch records
        $empQuery = $this->M_produk->get_fetch_produk($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
	    $data = array();

	    foreach($empQuery->result_array() as $row){
			$hasil_convert = number_format((int)$row['produk_harga'], 0, ',', '.');
			$cek = '<button value="'.$row['produk_id'].'" type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-default" data-whatever="'.$row['produk_id'].'" data-keyboard="false" data-backdrop="static">
					<i class="fas fa-info-circle"></i>
				</button>';

            $data[] = array( 
                "produk_id"=>$row['produk_id'],
                "produk_nama"=>$row['produk_nama'],
                "produk_kategori"=>$row['produk_kategori'],
                "produk_harga"=>$hasil_convert,
				"cek" => $cek
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

    function tbl_kategori(){
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
		$records = $this->M_produk->get_all_kategori();
		foreach($records->result_array() as $row){
			$totalRecords = $row['allcount'];
		}
		

		## Total number of record with filtering
		$records = $this->M_produk->get_all_kategori_search($searchQuery);
		foreach($records->result_array() as $row){
			$totalRecordwithFilter = $row['allcount'];
		}
		

		## Fetch records
        $empQuery = $this->M_produk->get_fetch_kategori($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
	    $data = array();

	    foreach($empQuery->result_array() as $row){
            $data[] = array( 
                "kategori_id"=>$row['kategori_id'],
                "kategori_nama"=>$row['kategori_nama'],
                "kategori_jumlah"=>$row['kategori_jumlah']
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

    function tbl_stok(){
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
		$records = $this->M_produk->get_all_stok();
		foreach($records->result_array() as $row){
			$totalRecords = $row['allcount'];
		}
		

		## Total number of record with filtering
		$records = $this->M_produk->get_all_stok_search($searchQuery);
		foreach($records->result_array() as $row){
			$totalRecordwithFilter = $row['allcount'];
		}
		

		## Fetch records
        $empQuery = $this->M_produk->get_fetch_stok($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
	    $data = array();

	    foreach($empQuery->result_array() as $row){
            $data[] = array( 
                "produk_id"=>$row['produk_id'],
                "produk_nama"=>$row['produk_nama'],
                "produk_kategori"=>$row['produk_kategori'],
                "stok_awal"=>$row['stok_awal'],
                "stok_masuk"=>$row['stok_masuk'],
                "stok_keluar"=>$row['stok_keluar'],
                "stok_penjualan"=>$row['stok_penjualan'],
                "stok_transfer"=>$row['stok_transfer'],
                "stok_penyesuaian"=>$row['stok_penyesuaian'],
                "stok_akhir"=>$row['stok_akhir'],
                "produk_satuan"=>$row['produk_satuan']
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

    function tbl_stok_in(){
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
		$records = $this->M_produk->get_all_stok_in();
		foreach($records->result_array() as $row){
			$totalRecords = $row['allcount'];
		}
		

		## Total number of record with filtering
		$records = $this->M_produk->get_all_stok_in_search($searchQuery);
		foreach($records->result_array() as $row){
			$totalRecordwithFilter = $row['allcount'];
		}
		

		## Fetch records
        $empQuery = $this->M_produk->get_fetch_stok_in($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
	    $data = array();
	    foreach($empQuery->result_array() as $row){
			$cek = '<button value="'.$row['stok_in_id'].'" type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-default" data-whatever="'.$row['stok_in_id'].'">
				Detail
		  	</button>';

            $data[] = array( 
                "stok_in_dt_create"=>$row['stok_in_dt_create'],
                "stok_in_id"=>$row['stok_in_id'],
                "stok_in_dt_masuk"=>$row['stok_in_dt_masuk'],
                "cek"=>$cek
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

    function tbl_stok_out(){
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
		$records = $this->M_produk->get_all_stok_out();
		foreach($records->result_array() as $row){
			$totalRecords = $row['allcount'];
		}
		

		## Total number of record with filtering
		$records = $this->M_produk->get_all_stok_out_search($searchQuery);
		foreach($records->result_array() as $row){
			$totalRecordwithFilter = $row['allcount'];
		}
		

		## Fetch records
        $empQuery = $this->M_produk->get_fetch_stok_out($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
	    $data = array();

	    foreach($empQuery->result_array() as $row){

			$cek = '<button value="'.$row['stok_out_id'].'" type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-default" data-whatever="'.$row['stok_out_id'].'">
			  Detail
			</button>';

            $data[] = array( 
                "stok_out_dt_create"=>$row['stok_out_dt_create'],
                "stok_out_id"=>$row['stok_out_id'],
                "stok_out_dt_masuk"=>$row['stok_out_dt_masuk'],
                "cek"=>$cek
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

	function tambah_produk_baru(){
		date_default_timezone_set("Asia/Jakarta");
		if(($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '10')){
			$produk_level = 0;
		}else if($this->session->userdata('akses') == '11'){
			$produk_level = 1;
		}

		$data = array(
			'produk_id' => $this->get_kd_produk(),
			'produk_nama' => $this->input->post('nm_produk', true),
			'produk_kategori' => $this->input->post('kategori', true),
			'produk_harga' => $this->input->post('harga', true),
			'produk_sku' => $this->input->post('sku', true),
			'produk_satuan' => $this->input->post('satuan', true),
			'produk_jual' => $this->input->post('jual_produk', true),
			'produk_stok' => $this->input->post('stok_produk', true),
			'produk_deskripsi' => $this->input->post('diskripsi', true),
			'produk_jenis' => $this->input->post('jenis_produk', true),
			'produk_dt_create' => date('Y-m-d H:i:s'),
			'produk_user_create' => $this->session->userdata('nama'),
			'produk_aktif' => 1,
			'produk_level' => $produk_level
		);

		if($this->input->post('jenis_produk', true) == 2){
			$resep_bb = $this->input->post('resep_bb', true);
        	$resep_jml = $this->input->post('resep_jml', true);
			$data_resep = array();

			$index = 0;
			foreach($resep_bb as $d_resep){
				array_push($data_resep, array(
					'resep_produk_id' => $this->get_kd_produk(),
					'resep_produk_bb' => $d_resep,
					'resep_produk_jml' => $resep_jml[$index]
				));
				$index++;
			}

			$this->M_produk->insert_resep_menu_batch($data_resep);
		}

		if($this->input->post('stok_produk', true) == 1){
			$data_stok = array(
				'produk_id' => $this->get_kd_produk(),
				'stok_awal' => 0,
				'stok_masuk' => 0,
				'stok_keluar' => 0,
				'stok_penjualan' => 0,
				'stok_transfer' => 0,
				'stok_penyesuaian' => 0,
				'stok_akhir' => 0,
				'stok_dt_create' => date('Y-m-d H:i:s'),
				'stok_user_create' => $this->session->userdata('nama')
			);

			$this->M_produk->insert_data_stok_baru($data_stok);
		}

		$this->M_produk->insert_data_produk_baru($data);
		
		redirect('Administrator/produk');
	}

	function get_kd_produk(){
		$kode = $this->M_produk->get_kode_produk();
        foreach($kode->result_array() as $row){
            $data = $row['maxkode'];
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "RO-";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
	}

	function proses_upload_foto_produk(){
		$config['upload_path'] = FCPATH.'/upload';
		$config['allowed_types'] = 'gif|jpg|png|ico';
		$this->load->library('upload', $config);

		if($this->upload->do_upload('userfile')){
			$data = array(
				'produk_id' => $this->get_kd_produk(),
				'foto_nama' => $this->upload->data('file_name'),
				'foto_aktif' => 1
			);

			$this->M_produk->insert_foto_produk_baru($data);
		}
	}

	function hapus_upload_foto_produk(){
		$name = $this->input->post('id', true);
		$path = FCPATH.'/upload/'.$name;
		
		chown($path, 666);

		if (unlink($path)) {
			$this->M_produk->update_foto_produk_baru($name);
			echo 'success';
		} else {
			echo 'fail';
		}
	}

	function tambah_stok_in_baru(){
		$data = array(
			'stok_in_id' => $this->get_kode_stok_in(),
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
				'stok_in_detail_id' => $this->get_kode_stok_in(),
				'stok_in_detail_produk_id' => $data_nm,
				'stok_in_detail_jumlah' => $produk_jml[$index],
				'stok_in_detail_harga' => $produk_harga[$index]
			));
			
			$index++;
		}

		$this->M_produk->insert_batch_produk_stok_in($produk_data);

		$this->M_produk->insert_stok_in($data);

		redirect('Administrator/stok_in');
	}

	function tambah_stok_out_baru(){
		$data = array(
			'stok_out_id' => $this->get_kode_stok_out(),
			'stok_out_dt_masuk' => date('Y-m-d', strtotime($this->input->post('tgl_stok_out', true))),
			'stok_out_dt_create' => date('Y-m-d H:i:s'),
			'stok_out_user_create' => $this->session->userdata('nama'),
			'stok_out_aktif' => 1
		);

		$produk_nm = $this->input->post('produk_nm', true);
		$produk_jml = $this->input->post('produk_jml', true);

		$produk_data = array();

		$index = 0;
		foreach($produk_nm as $data_nm){
			array_push($produk_data, array(
				'stok_out_detail_id' => $this->get_kode_stok_out(),
				'stok_out_detail_produk_id' => $data_nm,
				'stok_out_detail_jumlah' => $produk_jml[$index]
			));

			$index++;
		}

		$this->M_produk->insert_batch_produk_stok_out($produk_data);
		
		$this->M_produk->insert_stok_out($data);
		
		redirect('Administrator/stok_out');
	}

	function get_kode_stok_in(){
		$kode = $this->M_produk->get_kode_stok_in();
        foreach($kode->result_array() as $row){
            $data = $row['maxkode'];
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "SI-";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
	}

	function get_kode_stok_out(){
		$kode = $this->M_produk->get_kode_stok_out();
        foreach($kode->result_array() as $row){
            $data = $row['maxkode'];
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "SO-";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
	}

	function get_produk_detail(){
		$id = $this->input->get('produk_id', true);

		$data = $this->M_produk->get_produk_detail($id);

		echo json_encode($data);
	}

	function get_detail_stok_keluar(){
        $id = $this->input->get('id', true);
        $data = array(
            'keterangan' => $this->M_produk->get_data_keterangan_stok_out($id),
            'detail_produk' => $this->M_produk->get_detail_produk_stok_out($id)
        );

        echo json_encode($data);
    }

	function get_detail_stok_masuk(){
		$id = $this->input->get('id', true);
		$data = array(
			'keterangan' => $this->M_produk->get_data_keterangan_stok_in($id),
			'detail_produk' => $this->M_produk->get_detail_produk_stok_in($id)
		);

		echo json_encode($data);
	}

	function get_stok_all(){
		$data = array(
            'produk' => $this->M_produk->all_stok_produk(),
            'stokin' => $this->M_produk->all_stok_in(),
            'stokout' => $this->M_produk->all_stok_out()
        );

        echo json_encode($data);
	}

	function get_detail_produk_pilih(){
        $id = $this->input->get('id', true);

        $data = $this->M_produk->get_detail_produk_pilih($id);

        echo json_encode($data);
    }

	function get_semua_stok_kotor(){
        $data = array(
            'produk' => $this->M_produk->get_semua_stok_kotor_js()
        );

        echo json_encode($data);
    }

	function get_detail_produk(){
		$id = $this->input->get('id', TRUE);
		$data = array(
			'detail' => $this->M_produk->get_detail_produk($id)
		);

		echo json_encode($data);
	}

	function get_resep_produk(){
		$id = $this->input->get('id', TRUE);
		$data = array(
			'resep' => $this->M_produk->get_detail_resep($id)
		);

		echo json_encode($data);
	}

	function get_foto_produk(){
		$nama = $this->input->get('id');
        $html = '';
		$html .= '
			<a target="_blank" href="'.sprintf("../upload/%s", $nama).'">
				<img src="'.sprintf("../upload/%s", $nama).'" alt="'.$nama.'" width="120" height="120">
			</a>
		';
        
        echo $html;
	}
}
?>