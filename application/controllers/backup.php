<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bersih extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        if((!empty($_SESSION['masuk']) && !empty($_SESSION['akses']))){
            $this->load->model('M_bersih');
            $this->load->model('M_kategori');
            $this->load->model('M_produk');
        }else{
			echo redirect('Welcome');
		}
    }

    public function index(){
        $this->load->view('bersih/bersih_dashboard');
    }

    public function order(){
        $this->load->view('bersih/bersih_order');
    }

    public function stok(){
        $this->load->view('bersih/bersih_stok');
    }

    public function stok_in(){
        $this->load->view('bersih/bersih_stok_in');
    }

    public function stok_out(){
        $this->load->view('bersih/bersih_stok_out');
    }

    public function stok_alat(){
        $this->load->view('bersih/bersih_stok_alat');
    }

    public function stok_in_alat(){
        $this->load->view('bersih/bersih_stok_in_alat');
    }

    public function stok_out_alat(){
        $this->load->view('bersih/bersih_stok_out_alat');
    }

    public function laba(){
        $this->load->view('bersih/laba');
    }

    public function tambah_order(){
        $data = array(
            'kategori' => $this->M_kategori->get_semua_kategori(),
            'produk' => $this->M_produk->get_semua_produk_jual()
        );
        $this->load->view('bersih/bersih_tambah_order', $data);
    }

    public function kurang_stok(){
        $data = array(
            'produk' => $this->M_bersih->get_semua_stok_kotor()
        );
        $this->load->view('bersih/bersih_kurang_order', $data);
    }

    function tambah_stok(){
        $data = array(
            'produk' => $this->M_bersih->get_semua_stok_kotor()
        );
		$this->load->view('bersih/bersih_tambah_stok_in', $data);
	}

    function tambah_stok_alat(){
		$this->load->view('bersih/bersih_tambah_stok_in_alat');
	}

    function tambah_order_baru(){
        $data = array(
            // 'order_id' => $this->get_kode_order_id(),
            'order_id' => $this->input->post('kode', true),
            'order_nm_pemesan' => $this->input->post('pelanggan_nm', true),
            'order_bayar' => $this->input->post('pelanggan_byr', true),
            'order_diskon' => $this->input->post('pelanggan_diskon', true),
            'order_total_pesanan' => $this->input->post('total_byr_pesanan', true),
            'order_dt_create' => date('Y-m-d H:i:s'),
            'order_user_create' => $this->session->userdata('nama'),
            'order_aktif' => 1,
        );

        $this->M_bersih->insert_order($data);
    }

    function tambah_order_baru_detail(){
        $data = $this->input->post('data', true);
        $produk_data = array();

        $cek_tgl_stok_out_akhir = $this->M_bersih->cek_tgl_stok_out_akhir();

        if($cek_tgl_stok_out_akhir){
            foreach($cek_tgl_stok_out_akhir as $row){
                if($row['tgl'] == date('d-m-Y')){
                    $data_stok_out_bersih = array(
                        'stok_out_id' => $this->get_kode_stok_out_id(),
                        'stok_out_dt_masuk' => date('Y-m-d'),
                        'stok_out_dt_create' => date('Y-m-d H:i:s'),
                        'stok_out_user_create' => $this->session->userdata('nama'),
                        'stok_out_aktif' => 1
                    );
    
                    $this->M_bersih->insert_data_stok_out($data_stok_out_bersih);
                }
            }
        }else{
            $data_stok_out_bersih = array(
                'stok_out_id' => $this->get_kode_stok_out_id(),
                'stok_out_dt_masuk' => date('Y-m-d'),
                'stok_out_dt_create' => date('Y-m-d H:i:s'),
                'stok_out_user_create' => $this->session->userdata('nama'),
                'stok_out_aktif' => 1
            );

            $this->M_bersih->insert_data_stok_out($data_stok_out_bersih);
        }
        

        for($i=0; $i < count($data); $i++){
            array_push($produk_data, array(
                'order_detail_id' => $this->get_kode_order_detail_id(),
                'order_detail_produk_id' => $data[$i][1],
                'order_detail_jumlah' => $data[$i][0],
                // 'order_id' => $this->get_kode_order_id_detail()
                'order_id' => $data[$i][2]
            ));

            switch($data[$i][1]){
                case 'RO-000003':
                    // pindang kemangi
                    $array_detail = array();
                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000010',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // kemangi
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000037',
                        'stok_out_detail_jumlah' => 0.09*$data[$i][0]
                    ));

                    break;
                case 'RO-000030':
                    // pindang pete
                    $array_detail = array();
                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000010',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // pete
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000038',
                        'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                    ));
                    break;
                case 'RO-000031':
                    // pindang balado
                    $array_detail = array();
                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000010',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    break;
                case 'RO-000004':
                    // lele goreng
                    $array_detail = array();
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000001',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000017':
                    // lele balado
                    $array_detail = array();
                    // lele
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000001',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    break;
                case 'RO-000020':
                    // lele kemangi
                    $array_detail = array();
                    // lele
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000001',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // kemangi
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000037',
                        'stok_out_detail_jumlah' => 0.09*$data[$i][0]
                    ));
                    break;
                case 'RO-000021':
                    // lele pete
                    $array_detail = array();
                    // lele
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000001',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // pete
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000038',
                        'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                    ));
                case 'RO-000005':
                    // ayam ungkep
                    $array_detail = array();
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000002',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000015':
                    // ayam balado
                    $array_detail = array();
                    // ayam
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000002',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));
                    break;
                case 'RO-000018':
                    // ayam kemangi
                    $array_detail = array();
                    // ayam
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000002',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    
                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // kemangi
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000037',
                        'stok_out_detail_jumlah' => 0.09*$data[$i][0]
                    ));
                    break;
                case 'RO-000019':
                    // ayam pete
                    $array_detail = array();
                    // ayam
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000002',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // pete
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000038',
                        'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                    ));
                    break;
                case 'RO-000022':
                    // cumi kemangi
                    $array_detail = array();
                    // cumi
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000011',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // kemangi
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000037',
                        'stok_out_detail_jumlah' => 0.09*$data[$i][0]
                    ));
                    break;
                case 'RO-000023':
                    // cumi pete
                    $array_detail = array();
                    // cumi
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000011',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // pete
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000038',
                        'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                    ));
                    break;
                case 'RO-000024':
                    // cumi hitam
                    $array_detail = array();
                    // cumi
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000011',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));
                    break;
                case 'RO-000007':
                    // daging balado
                    $array_detail = array();
                    // daging
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000008',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));
                    break;
                case 'RO-000025':
                    // daging kemangi
                    $array_detail = array();
                    // daging
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000008',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // kemangi
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000037',
                        'stok_out_detail_jumlah' => 0.09*$data[$i][0]
                    ));
                    break;
                case 'RO-000026':
                    // daging pete
                    $array_detail = array();
                    // daging
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000008',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // pete
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000038',
                        'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                    ));
                    break;
                case 'RO-000016':
                    // nasi
                    $array_detail = array();
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    // array_push($array_detail, array(
                    //     'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                    //     'stok_out_detail_produk_id' => 'RO-000013',
                    //     'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    // ));
                    break;
                case 'RO-000029':
                    // telur bakso balado
                    $array_detail = array();
                    // telur bakso
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000039',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));
                    break;
                case 'RO-000028':
                    // telur bakso pete
                    $array_detail = array();
                    // telur bakso
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000039',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // pete
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000038',
                        'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                    ));
                    break;
                case 'RO-000027':
                    // telur bakso kemangi
                    $array_detail = array();
                    // telur bakso
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000039',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // kemangi
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000037',
                        'stok_out_detail_jumlah' => 0.09*$data[$i][0]
                    ));
                    break;
                case 'RO-000034':
                    // teh panas
                    $array_detail = array();
                    // teh
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000040',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // air
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000047',
                        'stok_out_detail_jumlah' => 0.01*$data[$i][0]
                    ));

                    // gula
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000042',
                        'stok_out_detail_jumlah' => 0.03*$data[$i][0]
                    ));
                    break;
                case 'RO-000033':
                    // es teh
                    $array_detail = array();
                    // teh
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000040',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // air
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000047',
                        'stok_out_detail_jumlah' => 0.01*$data[$i][0]
                    ));
                    // es
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000050',
                        'stok_out_detail_jumlah' => 0.007*$data[$i][0]
                    ));
                    // gula
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000042',
                        'stok_out_detail_jumlah' => 0.03*$data[$i][0]
                    ));
                    break;
                case 'RO-000036':
                    // jeruk panas
                    $array_detail = array();
                    // jeruk
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000041',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // air
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000047',
                        'stok_out_detail_jumlah' => 0.01*$data[$i][0]
                    ));
                    // gula
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000042',
                        'stok_out_detail_jumlah' => 0.03*$data[$i][0]
                    ));
                    break;
                case 'RO-000035':
                    // es jeruk
                    $array_detail = array();
                    // jeruk
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000041',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));
                    // air
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000047',
                        'stok_out_detail_jumlah' => 0.01*$data[$i][0]
                    ));
                    // es
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000050',
                        'stok_out_detail_jumlah' => 0.007*$data[$i][0]
                    ));
                    // gula
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000042',
                        'stok_out_detail_jumlah' => 0.03*$data[$i][0]
                    ));
                    break;
                case 'RO-000051':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000010',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // kemangi
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000037',
                        'stok_out_detail_jumlah' => 0.09*$data[$i][0]
                    ));
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000052':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000010',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // pete
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000038',
                        'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                    ));
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000053':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000010',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000054':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000002',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000055':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000002',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000037',
                        'stok_out_detail_jumlah' => 0.09*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000056':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000002',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));
                    // pete
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000038',
                        'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000057':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000002',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    // sambal matang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000058':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000001',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000059':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000001',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // kemangi
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000037',
                        'stok_out_detail_jumlah' => 0.09*$data[$i][0]
                    ));
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000060':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000001',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    // pete
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000038',
                        'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                    ));
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000061':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000001',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000062':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000039',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000063':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000039',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));
                    // pete
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000038',
                        'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000064':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000039',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000065':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000011',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000066':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000011',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));
                    // kemangi
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000037',
                        'stok_out_detail_jumlah' => 0.09*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000067':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000011',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));
                    // pete
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000038',
                        'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000068':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000008',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));
                    // kemangi
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000037',
                        'stok_out_detail_jumlah' => 0.09*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000072':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000008',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));
                    // pete
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000038',
                        'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000070':
                    $array_detail = array();
                    // paket sambal matang kemangi pindang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000008',
                        'stok_out_detail_jumlah' => 1*$data[$i][0]
                    ));
                    // sambal masak
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000009',
                        'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                    ));

                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000012',
                        'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                    ));
                    // sambal bawang
                    array_push($array_detail, array(
                        'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                        'stok_out_detail_produk_id' => 'RO-000013',
                        'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                    ));
                    break;
                case 'RO-000073':
                        $array_detail = array();
                        // oseng udang kemangi
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000045',
                            'stok_out_detail_jumlah' => 1*$data[$i][0]
                        ));

                        // sambal masak
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000009',
                            'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                        ));

                        // kemangi
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000037',
                            'stok_out_detail_jumlah' => 0.09*$data[$i][0]
                        ));
                    break;
                case 'RO-000074':
                        $array_detail = array();
                        // oseng udang pete
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000045',
                            'stok_out_detail_jumlah' => 1*$data[$i][0]
                        ));

                        // sambal masak
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000009',
                            'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                        ));

                        // pete
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000038',
                            'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                        ));
                    break;
                case 'RO-000075':
                        $array_detail = array();
                        // oseng udang balado
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000045',
                            'stok_out_detail_jumlah' => 1*$data[$i][0]
                        ));

                        // sambal masak
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000009',
                            'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                        ));
                    break;
                case 'RO-000076':
                        $array_detail = array();
                        // nasi oseng udang kemangi
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000045',
                            'stok_out_detail_jumlah' => 1*$data[$i][0]
                        ));

                        // sambal masak
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000009',
                            'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                        ));

                        // kemangi
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000037',
                            'stok_out_detail_jumlah' => 0.09*$data[$i][0]
                        ));
                        // nasi
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000012',
                            'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                        ));
                        // sambal bawang
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000013',
                            'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                        ));
                    break;
                case 'RO-000077':
                        $array_detail = array();
                        // nasi oseng udang pete
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000045',
                            'stok_out_detail_jumlah' => 1*$data[$i][0]
                        ));

                        // sambal masak
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000009',
                            'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                        ));

                        // pete
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000038',
                            'stok_out_detail_jumlah' => 0.5*$data[$i][0]
                        ));
                        // nasi
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000012',
                            'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                        ));
                        // sambal bawang
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000013',
                            'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                        ));
                    break;
                case 'RO-000078':
                        $array_detail = array();
                        // oseng udang balado
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000045',
                            'stok_out_detail_jumlah' => 1*$data[$i][0]
                        ));

                        // sambal masak
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000009',
                            'stok_out_detail_jumlah' => 0.05*$data[$i][0]
                        ));
                        // nasi
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000012',
                            'stok_out_detail_jumlah' => 0.083*$data[$i][0]
                        ));
                        // sambal bawang
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000013',
                            'stok_out_detail_jumlah' => 0.02*$data[$i][0]
                        ));
                    break;
                case 'RO-000032':
                        $array_detail = array();
                        // dadar jagung
                        array_push($array_detail, array(
                            'stok_out_detail_id' => $this->get_stok_out_kode_detail(),
                            'stok_out_detail_produk_id' => 'RO-000044',
                            'stok_out_detail_jumlah' => 1*$data[$i][0]
                        ));
                    break;
            }
            $this->M_bersih->insert_batch_stok_out_bersih($array_detail);
            // print_r($array_detail);
        }
        
        $this->M_bersih->insert_batch_order_detail($produk_data);
    }

    function order_selesai(){
        $id = $this->input->post('id', true);

        $data = array(
            'order_dt_modif' => date('Y-m-d H:i:s'),
            'order_user_modif' => $this->session->userdata('nama'),
            'order_selesai' => 1
        );

        $this->M_bersih->update_order_selesai($id, $data);
    }

    function get_detail_stok_keluar(){
        $id = $this->input->get('id', true);
        $data = array(
            'keterangan' => $this->M_bersih->get_data_keterangan_stok_out($id),
            'detail_produk' => $this->M_bersih->get_detail_produk_stok_out($id),
            'produk' => $this->M_bersih->all_stok_produk_bersih(),
        );

        echo json_encode($data);
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
		$records = $this->M_bersih->get_all_bersih();
		foreach($records->result_array() as $row){
			$totalRecords = $row['allcount'];
		}
		

		## Total number of record with filtering
		$records = $this->M_bersih->get_all_bersih_search($searchQuery);
		foreach($records->result_array() as $row){
			$totalRecordwithFilter = $row['allcount'];
		}
		

		## Fetch records
        $empQuery = $this->M_bersih->get_fetch_bersih($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
	    $data = array();

	    foreach($empQuery->result_array() as $row){
            $cek = '<button value="'.$row['order_id'].'" type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-default" data-whatever="'.$row['order_id'].'" data-keyboard="false" data-backdrop="static">
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

        $user_login = $this->session->userdata('nama');

        $searchQuery .= " AND tbl_stok_in_bersih.stok_in_user_create LIKE '%$user_login%' ";

		## Total number of records without filtering
		$records = $this->M_bersih->get_all_bersih_stok_in();
		foreach($records->result_array() as $row){
			$totalRecords = $row['allcount'];
		}
		

		## Total number of record with filtering
		$records = $this->M_bersih->get_all_bersih_stok_in_search($searchQuery);
		foreach($records->result_array() as $row){
			$totalRecordwithFilter = $row['allcount'];
		}
		

		## Fetch records
        $empQuery = $this->M_bersih->get_fetch_bersih_stok_in($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
	    $data = array();
	    foreach($empQuery->result_array() as $row){
			$cek = '<button value="'.$row['stok_in_id'].'" type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-default" data-whatever="'.$row['stok_in_id'].'">
				Detail
		  	</button>';

            $data[] = array( 
                "stok_in_dt_create"=>$row['stok_in_dt_create'],
                "stok_in_id"=>$row['stok_in_id'],
                "catatan"=>$row['catatan'],
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

    function tbl_stok_in_alat(){
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
		$records = $this->M_bersih->get_all_bersih_stok_in_alat();
		foreach($records->result_array() as $row){
			$totalRecords = $row['allcount'];
		}
		

		## Total number of record with filtering
		$records = $this->M_bersih->get_all_bersih_stok_in_search_alat($searchQuery);
		foreach($records->result_array() as $row){
			$totalRecordwithFilter = $row['allcount'];
		}
		

		## Fetch records
        $empQuery = $this->M_bersih->get_fetch_bersih_stok_in_alat($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
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
		$records = $this->M_bersih->get_all_stok_out_bersih();
		foreach($records->result_array() as $row){
			$totalRecords = $row['allcount'];
		}
		

		## Total number of record with filtering
		$records = $this->M_bersih->get_all_stok_out_bersih_search($searchQuery);
		foreach($records->result_array() as $row){
			$totalRecordwithFilter = $row['allcount'];
		}
		

		## Fetch records
        $empQuery = $this->M_bersih->get_fetch_stok_out_bersih($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
	    $data = array();

	    foreach($empQuery->result_array() as $row){

			$cek = '<button value="'.$row['stok_out_id'].'" type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-default" data-whatever="'.$row['stok_out_id'].'">
			  Detail
			</button>';

            $data[] = array( 
                "stok_out_dt_create"=>$row['stok_out_dt_create'],
                "stok_out_id"=>$row['stok_out_id'],
                "catatan"=>$row['catatan'],
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

    function tambah_stok_out_baru(){
		$data = array(
			'stok_out_id' => $this->get_kode_stok_out_id(),
			'stok_out_dt_masuk' => date('Y-m-d', strtotime($this->input->post('tgl_stok_out', true))),
			'stok_out_dt_create' => date('Y-m-d H:i:s'),
			'stok_out_user_create' => $this->session->userdata('nama'),
			'stok_out_aktif' => 1,
            'catatan' => $this->input->post('catatan', TRUE)
		);

		$produk_nm = $this->input->post('produk_nm', true);
		$produk_jml = $this->input->post('produk_jml', true);

		$produk_data = array();

		$index = 0;
		foreach($produk_nm as $data_nm){
			array_push($produk_data, array(
				'stok_out_detail_id' => $this->get_kode_stok_out_id(),
				'stok_out_detail_produk_id' => $data_nm,
				'stok_out_detail_jumlah' => $produk_jml[$index]
			));

			$index++;
		}

		$this->M_bersih->insert_batch_stok_out_bersih($produk_data);
		
		$this->M_bersih->insert_data_stok_out($data);
		
		redirect('Bersih/stok_out');
	}

    function tambah_stok_in_baru(){
        $data = array(
            'stok_in_id' => $this->get_kode_stok_in_bersih(),
            'stok_in_dt_masuk' => date('Y-m-d', strtotime($this->input->post('tgl_stok_in', true))),
            'stok_in_dt_create' => date('Y-m-d H:i:s'),
            'stok_in_user_create' => $this->session->userdata('nama'),
            'stok_in_aktif' => 1,
            'catatan' => $this->input->post('catatan', TRUE)
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

        $data_out = array(
            'stok_out_id' => $this->get_kode_stok_out_kotor(),
            'stok_out_dt_masuk' => date('Y-m-d', strtotime($this->input->post('tgl_stok_in', true))),
            'stok_out_dt_create' => date('Y-m-d H:i:s'),
            'stok_out_user_create' => $this->session->userdata('nama'),
            'stok_out_aktif' => 1,
            'catatan' => $this->input->post('catatan', TRUE)
        );

        $produk_data_out = array();

        $index_out = 0;

        foreach($produk_nm as $data_nm){
            array_push($produk_data_out, array(
                'stok_out_detail_id' => $this->get_kode_stok_out_kotor(),
                'stok_out_detail_produk_id' => $data_nm,
                'stok_out_detail_jumlah' => $produk_jml[$index_out]
            ));
        }


        $this->M_bersih->insert_batch_produk_stok_in($produk_data);

        $this->M_bersih->insert_stok_in($data);

        $this->M_bersih->insert_batch_stok_out_kotor($produk_data_out);

        $this->M_bersih->insert_stok_out_kotor($data_out);

        redirect('Bersih/stok_in');
    }

    function get_detail_produk_pilih(){
        $id = $this->input->get('id', true);

        $data = $this->M_bersih->get_detail_produk_pilih($id);

        echo json_encode($data);
    }

    function get_semua_stok_kotor(){
        $data = array(
            'produk' => $this->M_bersih->get_semua_stok_kotor_js()
        );

        echo json_encode($data);
    }

    function get_detail_stok_masuk_bersih(){
        $id = $this->input->get('id', true);
        $data = array(
            'keterangan' => $this->M_bersih->get_data_keterangan_stok_in_bersih($id),
            'detail_produk' => $this->M_bersih->get_detail_produk_stok_in_bersih($id)
        );

        echo json_encode($data);
    }

    function get_stok_all_bersih(){
        $data = array(
            'produk' => $this->M_bersih->all_stok_produk_bersih(),
            'stokin' => $this->M_bersih->all_stok_in_bersih(),
            'stokout' => $this->M_bersih->all_stok_out_bersih(),
            'stokin_sblm' => $this->M_bersih->all_stok_in_bersih_sblm(),
            'stokout_sblm' => $this->M_bersih->all_stok_out_bersih_sblm()
        );

        echo json_encode($data);
    }

    function get_order_masuk_data(){
        $id = $this->input->get('id', true);
        $data = array(
            'order' => $this->M_bersih->get_data_order_masuk($id),
            'detail_order' => $this->M_bersih->get_detail_order_masuk($id)
        );

        echo json_encode($data);
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

    function get_kode_stok_out_id(){
		$kode = $this->M_bersih->get_kode_stok_out_id();
        foreach($kode->result_array() as $row){
            $data = $row['maxkode'];
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "OB-";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
	}

    function get_kode_stok_out_kotor(){
		$kode = $this->M_bersih->get_kode_stok_out_kotor();
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

    function get_kode_order_id(){
        $kode = $this->M_bersih->get_kode_order_id();
        foreach($kode->result_array() as $row){
            $data = $row['maxkode'];
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "OR-";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
    }

    function get_kode_order_id_detail(){
        $kode = $this->M_bersih->get_kode_order_id();
        foreach($kode->result_array() as $row){
            $data = $row['maxkode'];
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "OR-";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        echo json_encode($kodebaru);
    }

    function get_kode_order_detail_id(){
        $kode = $this->M_bersih->get_kode_order_detail_id();
        foreach($kode->result_array() as $row){
            $data = $row['maxkode'];
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "DO-";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
    }

    function get_stok_out_kode_detail(){
        $kode = $this->M_bersih->get_stok_out_kode_detail();
        foreach($kode->result_array() as $row){
            $data = $row['maxkode'];
        }

        $kodeinv = $data;
        return $kodeinv;
    }

    function get_all_laba(){
        $data = array(
            'uang_masuk' => $this->M_bersih->itung_uang_masuk(),
            'uang_hpp' => $this->M_bersih->itung_uang_hpp(),
            'pengeluaran' => $this->M_bersih->itung_uang_pengeluaran(),
            'pembelian_bb' => $this->M_bersih->itung_pembelian_bb(),
            'tanggal' => $this->M_bersih->get_tanggal(),
            'stok_masuk' => $this->M_bersih->get_stok_masuk(),
            'stok_jual' => $this->M_bersih->get_stok_jual()
        );

        echo json_encode($data);
    }
}