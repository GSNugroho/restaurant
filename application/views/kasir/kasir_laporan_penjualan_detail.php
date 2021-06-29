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
            <h1 class="m-0">Laporan Penjualan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Laporan</li>
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
                    <div class="card-body table-responsive p-0">
                        <h4>Tanggal : <?= $tanggal;?></h4>
                        <table class="table table-borderless" id="laporan" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th style="text-align: center;">Menu</th>
                                    <th style="text-align: right;">Jumlah Penjualan</th>
                                    <th style="text-align: right;">Harga Penjualan</th>
                                    <th style="text-align: right;">Total</th>
                                </tr>
                            </thead>
                            <tbody id="isi-laporan">
                                <?php
                                    $no = 1;
                                    $total = 0;
                                    foreach($penjualan as $row){
                                        echo '<tr>
                                            <td>'.$no.'.</td>
                                            <td>'.$row['produk_nama'].'</td>
                                            <td style="text-align: right;">'.$row['jumlah_order'].'</td>
                                            <td style="text-align: right;">'.number_format($row['produk_harga'], 0, ',', '.').'</td>
                                            <td style="text-align:right;">'.number_format(((int) $row['jumlah_order'] * (int) $row['produk_harga']), 0, ',', '.').'</td>
                                        </tr>';
                                        $no++;
                                        $total = $total + ((int) $row['jumlah_order'] * (int) $row['produk_harga']);
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" style="text-align: right;">Total</th>
                                    <td style="text-align: right;"><?= number_format($total, 0, ',', '.')?></td>
                                </tr>
                            </tfoot>
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
