<?php $this->load->view('mainmenu/admin_header');?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'?>">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laba</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
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
                        <form action="<?php echo base_url('Transaksi/laba_resmi_detail')?>" method="post">
                        <center>
                            <table>
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Bulan</th>
                                        <th></th>
                                        <th style="text-align: center;">Tahun</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="bulan" id="bulan">
                                                <option value="">Pilih</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <select class="form-control" name="tahun" id="tahun">
                                            </select>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <button class="btn btn-success" type="submit" id="button_hitung_laba">Hitung Laba Rugi</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                            <script>
                                $('#tahun').each(function() {

                                var year = (new Date()).getFullYear();
                                var current = year;
                                year -= 3;
                                for (var i = 0; i < 6; i++) {
                                if ((year+i) == current)
                                    $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
                                else
                                    $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
                                }

                                })
                            </script>
                        </form>
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
