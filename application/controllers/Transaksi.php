<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        if((!empty($_SESSION['masuk']) && !empty($_SESSION['akses']))){
            $this->load->model('M_bersih');
            $this->load->model('M_kategori');
            $this->load->model('M_produk');
            $this->load->model('M_transaksi');
        }else{
            $this->session->set_flashdata('error', 'Maaf, Anda Hapus Login Dahulu');
			redirect('Welcome');
		}
    }

    function laba_resmi_detail(){
        $bulan = $this->input->post('bulan', TRUE);
        $tahun = $this->input->post('tahun', TRUE);

        $data = array(
            'penjualan' => $this->M_transaksi->get_data_penjualan($bulan, $tahun),
            'stok_in_sblm' => $this->M_transaksi->get_data_stok_in_sblm($bulan, $tahun),
            'stok_out_sblm' => $this->M_transaksi->get_data_stok_out_sblm($bulan, $tahun),
            'stok_in_ini' => $this->M_transaksi->get_data_stok_in_ini($bulan, $tahun),
            'stok_out_ini' => $this->M_transaksi->get_data_stok_out_ini($bulan, $tahun),
            'stok_out_ini_nc' => $this->M_transaksi->get_data_stok_out_ini_nc($bulan, $tahun),
            'pos' => $this->M_transaksi->get_semua_pos(),
            'biaya' => $this->M_transaksi->get_detail_biaya($bulan, $tahun),
        );

        $this->load->view('bersih/bersih_laba_rugi_detail.php', $data);
    }

    function buku_besar_biaya(){
        $bulan = $this->input->post('bulan', TRUE);
        $tahun = $this->input->post('tahun', TRUE);

        $data = array(
            'biaya' => $this->M_transaksi->get_detail_biaya($bulan, $tahun),
            'pos' => $this->M_transaksi->get_semua_pos()
        );

        $this->load->view('bersih/bersih_buku_besar_detail.php', $data);
    }

    function tbl_transaksi(){
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

        // if($this->input->post('searchCari') != ''){
        //     $nama = $this->input->post('searchCari');
        //     $searchQuery .= " AND tbl_order.order_nm_pemesan LIKE '%$nama%' ";
        // }

        if($this->input->post('jns_saldo') != ''){
            $jns_saldo = $this->input->post('jns_saldo', TRUE);

            $searchQuery .= " AND tbl_transaksi.jns_saldo = $jns_saldo ";
        }

        $searchQuery .= " AND tbl_transaksi.dt_aktif = 1";

		## Total number of records without filtering
		$records = $this->M_transaksi->get_all_transaksi();
		foreach($records->result_array() as $row){
			$totalRecords = $row['allcount'];
		}
		

		## Total number of record with filtering
		$records = $this->M_transaksi->get_all_transaksi_search($searchQuery);
		foreach($records->result_array() as $row){
			$totalRecordwithFilter = $row['allcount'];
		}
		

		## Fetch records
        $empQuery = $this->M_transaksi->get_fetch_transaksi($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
	    $data = array();

	    foreach($empQuery->result_array() as $row){
            $cek = '<button style="width: 60px;" value="'.$row['kd_transaksi'].'" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-transaksi" data-whatever="'.$row['kd_transaksi'].'">
                <i class="fas fa-info-circle"></i>
                </button>
                <button style="width: 60px;" value="'.$row['kd_transaksi'].'" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-transaksi-hapus" data-whatever="'.$row['kd_transaksi'].'">
                <i class="fas fa-trash"></i>
                </button>
            ';

            if($row['jns_saldo'] == 1){
                $jns_saldo = 'Uang Keluar';
            }else if($row['jns_saldo'] == 2){
                $jns_saldo = 'Uang Masuk';
            }

            $saldo = number_format($row['saldo'], 0, ',', '.');

            $data[] = array( 
                "kd_transaksi"=>$row['kd_transaksi'],
                "tgl_input"=>$row['tgl_input'],
                "nm_pos"=>$row['nm_pos'],
                "keterangan"=>$row['keterangan'],
                "jns_saldo"=>$jns_saldo,
                "saldo"=>$saldo,
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

    function get_detail_transaksi(){
        $id = $this->input->get('id', TRUE);

        $data = array(
            'detail' => $this->M_transaksi->get_detail_transaksi($id)
        );

        echo json_encode($data);
    }

    function hapus_transaksi(){
        $id = $this->input->get('id', TRUE);

        $data = array(
            'dt_aktif' => 0
        );

        $this->M_transaksi->update_transaksi($id, $data);
    }
}
?>