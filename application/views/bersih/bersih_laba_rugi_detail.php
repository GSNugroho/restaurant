<?php $this->load->view('mainmenu/admin_header');?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'?>">
<!-- Content Wrapper. Contains page content -->
<style>
hr{
  border-top: 2px solid #000;
  margin-top: -10px;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Laba Rugi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pembukuan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="row">
                <div class="col-2">
                    <!-- <button class="btn btn-block btn-outline-secondary">Ekspor Produk</button> -->
                </div>
            </div>
            <br>
            <div class="card card-secondary card-tabs">
              <div class="card-body">
                    <h3></h3>
                    <div class="card-body table-responsive p-0">
                    <?php 
                        $uang_masuk = 0;
                        $hpp_awal_masuk = 0;
                        $hpp_awal_keluar = 0;
                        $stok_awal = 0;
                        $pembelian_hpp = 0;
                        $pembelian_periode = 0;
                        $siap_jual = 0;
                        $keluar_hpp = 0;
                        $stok_akhir = 0;
                        $laba_kotor = 0;

                        foreach($penjualan as $row){ 
                            $uang_masuk = $row['total_uang_masuk'];
                        }

                        foreach($stok_in_sblm as $row){
                            $hpp_awal_masuk = $row['hpp_masuk'];
                        }

                        foreach($stok_out_sblm as $row){
                            $hpp_awal_keluar = $row['hpp_keluar'];
                        }

                        foreach($stok_in_ini as $row){
                            $pembelian_hpp = $row['hpp_masuk'];
                        }

                        foreach($stok_out_ini as $row){
                            $keluar_hpp = $keluar_hpp + $row['hpp_keluar'];
                        }

                        foreach($stok_out_ini_nc as $row){
                            $keluar_hpp = $keluar_hpp + $row['hpp_keluar'];
                        }

                        $stok_awal = (int) $hpp_awal_masuk - (int) $hpp_awal_keluar;
                        $siap_jual = (int) $stok_awal + (int) $pembelian_hpp;
                        $stok_akhir = $siap_jual - $keluar_hpp;
                        $laba_kotor = (int) $uang_masuk - (int) $keluar_hpp
                    ?>
                      <table border="1" class="table table-borderless" style="width: 80%;">
                            <tr>
                                <td>Penjualan</td>
                                <td></td>
                                <td style="text-align: right;"><p id="penjualan_kotor"><?= 'Rp '.number_format($uang_masuk, 0, ',', '.');?></p></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>(-) Retur dan Pengurangan Penjualan</td>
                                <td></td>
                                <td style="text-align: right;"><p id="retur_penjualan">Rp 0</p></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>(-) Potongan Penjualan</td>
                                <td></td>
                                <td style="text-align: right;"><p id="potongan_penjualan">Rp 0</p></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Total Penjualan</td>
                                <td></td>
                                <td><hr></td>
                                <td style="text-align: right;"><p id="total_penjualan"><?= 'Rp '.number_format($uang_masuk, 0, ',', '.'); ?></p></td>
                            </tr>
                            <tr>
                                <td>Persediaan Awal</td>
                                <td></td>
                                <td style="text-align: right;"><p id="persedian_awal"><?= 'Rp '.number_format($stok_awal, 0, ',', '.'); ?></p></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pembelian</td>
                                <td style="text-align: right;"><p id="pembelian_stok"><?= 'Rp '.number_format($pembelian_hpp, 0, ',', '.'); ?></p></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(-) Retur & Potongan Pembelian</td>
                                <td style="text-align: right;"><p id="retur_potongan_pembelian">Rp 0</p></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(-) Potongan Pembelian</td>
                                <td style="text-align: right;"><p id="potongan_pembelian">Rp 0</p></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><hr></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Harga pembelian 1 periode</td>
                                <td></td>
                                <td style="text-align: right;"><p id="total_pembelian_stok"><?= 'Rp '.number_format($pembelian_hpp, 0, ',', '.');?></p></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><hr></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Barang dagang siap jual</td>
                                <td></td>
                                <td style="text-align: right;"><p id="total_stok_tersedia"><?= 'Rp '.number_format($siap_jual, 0, ',', '.');?></p></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>(-) Persediaan akhir</td>
                                <td></td>
                                <td style="text-align: right;"><p id="stok_akhir"><?= 'Rp '.number_format($stok_akhir, 0, ',', '.');?></p></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>(-) Harga pokok penjualan</td>
                                <td></td>
                                <td><hr></td>
                                <td style="text-align: right;"><p id="hpp_penjualan"><?= 'Rp '.number_format($keluar_hpp, 0, ',', '.');?></p></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><hr></td>
                            </tr>
                            <tr>
                                <td>Laba kotor penjualan</td>
                                <td></td>
                                <td></td>
                                <td style="text-align: right;"><p id="laba_kotor_penjualan"><?= 'Rp '.number_format($laba_kotor, 0, ',', '.');?></p></td>
                            </tr>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Biaya :</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                                $tablebiaya = '';
                                $totalsemua = 0;
                                foreach($pos as $p){
                                  $sumtotalbiaya = 0;
                                  $c = substr($p['kd_pos'], 0, 1);
                                  if($c == '4'){
                                      echo '<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$p['nm_pos'].'</td><td></td>';
                                  }
                                  foreach($biaya as $data){
                                    if($data['kd_pos'] == $p['kd_pos']){
                                      $totalsaldo = 0;
                                      $cek_kode = substr($data['kd_pos'], 0, 1);
                                      if($cek_kode == '4'){
                                          $totalsaldo = $totalsaldo + (int) $data['saldo'];;
                                          $sumtotalbiaya = $sumtotalbiaya + $totalsaldo;
                                      }
                                      
                                    }
                                  }
                                  if($c == '4'){
                                      echo '<td style="text-align: right;">Rp '.number_format($sumtotalbiaya, 0,',','.').'</td><td></td></tr>';
                                  }
                                  $totalsemua = $totalsemua + $sumtotalbiaya;
                                }
                            ?>
                            <tr>
                                <td>(-) Total biaya</td>
                                <td></td>
                                <td><hr></td>
                                <td style="text-align: right;"><p id="total_biaya"><?= 'Rp '.number_format($totalsemua, 0, ',', '.');?></p></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><hr></td>
                            </tr>
                            <tr>
                                <td style="text-align: center; background-color: orange;" colspan="3"><p>Laba (Rugi) Bersih</p></td>
                                <td style="text-align: right; background-color: orange;"><p id="laba_rugi_bersih"><?= 'Rp '.number_format(($laba_kotor - $totalsemua), 0, ',', '.');?></p></td>
                            </tr>
                      </table>
                    </div>
                    </div>
                </div>
              <!-- /.card -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>
