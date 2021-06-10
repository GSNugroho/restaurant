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
            <h1 class="m-0">Kartu Stok Alat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Alat</li>
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
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th style="display: none;">produk_id</th>
                                    <th>PRODUK</th>
                                    <th>KATEGORI</th>
                                    <th>STOK AWAL</th>
                                    <th>STOK MASUK</th>
                                    <th>STOK KELUAR</th>
                                    <th>STOK AKHIR</th>
                                    <th>SATUAN</th>
                                    <th>Porsi</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_detail_stok">
                            </tbody>
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
    <script>
    $(document).ready(function() {
        // get_data_stok();
    });

    function get_data_stok(){
        $.get("<?php echo base_url().'Bersih/get_stok_all_bersih'?>", function(data){
            var html = '';

            for(var i=0; i < data.produk.length; i++){
                var masuk = 0;
                var keluar = 0;
                var stok_awal = 0;
                var stok_masuk = 0;
                var stok_keluar = 0;

                var kd_produk = data.produk[i].produk_id;
                var jml_per_porsi = 1;
                html += `<tr><td>${data.produk[i].produk_nama}</td><td>${data.produk[i].kategori_nama}</td>`;
                
                html += `<td>${stok_awal}</td>`;
                if(data.stokin != ''){
                    for(var j=0; j < data.stokin.length; j++){
                        if(data.produk[i].produk_id == data.stokin[j].produk_id){
                            masuk += parseInt(data.stokin[j].produk_jml);
                            stok_masuk += parseInt(data.stokin[j].produk_jml);
                        }
                    }
                }
                html += `<td>${stok_masuk}</td>`;
                
                if(data.stokout != ''){
                    for(var k=0; k < data.stokout.length; k++){
                        if(data.produk[i].produk_id == data.stokout[k].produk_id){
                            keluar += parseInt(data.stokout[k].produk_jml);
                            stok_keluar += parseInt(data.stokout[k].produk_jml);
                        }
                    }
                }
                html += `<td>${stok_keluar}</td>`;
                
                var akhir = masuk - keluar;
                switch(kd_produk){
                    // case 'RO-000001':
                    //     jml_per_porsi = 2;
                    // break;
                    case 'RO-000009':
                        jml_per_porsi = 50;
                    break;
                    case 'RO-000012':
                        jml_per_porsi = 83.3;
                    break;
                    case 'RO-000013':
                        jml_per_porsi = 20;
                    break;
                }

                html += `<td>${masuk - keluar}</td><td>${data.produk[i].produk_satuan}</td><td>${Math.round(akhir/jml_per_porsi)}</td></tr>`;
            }
            $('#tbl_detail_stok').html(html);
        }, 'json');
    }
    </script>
<?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>
