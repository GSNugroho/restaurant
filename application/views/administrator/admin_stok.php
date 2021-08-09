<?php $this->load->view('mainmenu/admin_header');?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'?>">
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kartu Stok</h1>
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
                    <div class="col-9">
                      <h4>Produk Yang Dapat Distok Lama</h4>
                    </div>
                    <div class="card-body table-responsive p-0">
                      <table id="tbl_stok" class="table table-hover text-nowrap">
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
                            </tr>
                          </thead>
                          <tbody id="tbl_detail_stok">
                          </tbody>
                      </table>
                    </div>
                    <br>
                    <div class="col-9">
                      <h4>Produk 1 Hari Habis</h4>
                    </div>
                    <div class="card-body table-responsive p-0">
                      <table id="tbl_stok_habis" class="table table-hover text-nowrap">
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
                          </tr>
                        </thead>
                        <tbody id="tbl_detail_stok_habis">
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
      get_data_stok();

      Pusher.logToConsole = true;

      var pusher = new Pusher('fbc78684682a51811d95', {
        cluster: 'ap1'
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        get_data_stok();
      });
    });

    function get_data_stok(){
        $.get("<?php echo base_url().'Produk/get_stok_all'?>", function(data){
            var html = '';
            var html2 = '';

            for(var i=0; i < data.produk.length; i++){
              if(data.produk[i].produk_id != 'RO-000012' && data.produk[i].produk_id != 'RO-000085'){
                var masuk = 0;
                var keluar = 0;
                var stok_awal = 0;
                var stok_masuk = 0;
                var stok_keluar = 0;
                var masuk_sblm = 0;
                var keluar_sblm = 0;
                var stok_masuk_sblm = 0;
                var stok_keluar_sblm = 0;
                var stok_awal = 0;

                html += `<tr><td>${data.produk[i].produk_nama}</td><td>${data.produk[i].kategori_nama}</td>`;
                
                if(data.stokin_sblm != ''){
                  for(var j=0; j < data.stokin_sblm.length; j++){
                    if(data.produk[i].produk_id == data.stokin_sblm[j].produk_id){
                      masuk_sblm += parseFloat(data.stokin_sblm[j].produk_jml);
                      stok_masuk_sblm += parseFloat(data.stokin_sblm[j].produk_jml);
                    }
                  }
                }

                if(data.stokout_sblm != ''){
                  for(var j=0; j < data.stokout_sblm.length; j++){
                    if(data.produk[i].produk_id == data.stokout_sblm[j].produk_id){
                      keluar_sblm += parseFloat(data.stokout_sblm[j].produk_jml);
                      stok_keluar_sblm += parseFloat(data.stokout_sblm[j].produk_jml);
                    }
                  }
                }

                stok_awal = parseFloat(masuk_sblm - keluar_sblm);

                html += `<td>${(stok_awal).toFixed(2)}</td>`;
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
                

                html += `<td>${stok_awal + masuk - keluar}</td><td>${data.produk[i].produk_satuan}</td></tr>`;
              }else{
                var masuk2 = 0;
                var keluar2 = 0;
                var stok_awal2 = 0;
                var stok_masuk2 = 0;
                var stok_keluar2 = 0;
                var masuk_sblm2 = 0;
                var keluar_sblm2 = 0;
                var stok_masuk_sblm2 = 0;
                var stok_keluar_sblm2 = 0;
                var stok_awal2 = 0;

                html2 += `<tr><td>${data.produk[i].produk_nama}</td><td>${data.produk[i].kategori_nama}</td>`;
                if(data.stokin_sblm != ''){
                    for(var j=0; j < data.stokin_sblm.length; j++){
                        if(data.produk[i].produk_id == data.stokin_sblm[j].produk_id){
                            masuk_sblm2 += parseFloat(data.stokin_sblm[j].produk_jml);
                            stok_masuk_sblm2 += parseFloat(data.stokin_sblm[j].produk_jml);
                        }
                    }
                }

                if(data.stokout_1hari_sblm != ''){
                    for(var j=0; j < data.stokout_1hari_sblm.length; j++){
                        if((data.produk[i].produk_id == data.stokout_1hari_sblm[j].produk_id) && (data.stokout_1hari_sblm[j].user_create != 'Teller 1')){
                            keluar_sblm2 += parseFloat(data.stokout_1hari_sblm[j].produk_jml);
                            stok_keluar_sblm2 += parseFloat(data.stokout_1hari_sblm[j].produk_jml);
                        }
                    }
                }
                
                stok_awal2 = parseFloat(masuk_sblm2 - keluar_sblm2);
                html2 += `<td>${(stok_awal2).toFixed(2)}</td>`;

                if(data.stokin != ''){
                    for(var j=0; j < data.stokin.length; j++){
                        if(data.produk[i].produk_id == data.stokin[j].produk_id){
                            masuk2 += parseFloat(data.stokin[j].produk_jml);
                            stok_masuk2 += parseFloat(data.stokin[j].produk_jml);
                        }
                    }
                }
                html2 += `<td>${(stok_masuk2).toFixed(2)}</td>`;
                
                if(data.stokout_1hari != ''){
                    for(var k=0; k < data.stokout_1hari.length; k++){
                        if((data.produk[i].produk_id == data.stokout_1hari[k].produk_id) && (data.stokout_1hari[k].user_create != 'Teller 1')){
                            keluar2 += parseFloat(data.stokout_1hari[k].produk_jml);
                            stok_keluar2 += parseFloat(data.stokout_1hari[k].produk_jml);
                        }
                    }
                }
                html2 += `<td>${stok_keluar2}</td>`;
                

                html2 += `<td>${stok_awal2 + masuk2 - keluar2}</td><td>${data.produk[i].produk_satuan}</td></tr>`;
              }
              
            }

            $('#tbl_detail_stok').html(html);
            $('#tbl_detail_stok_habis').html(html2);
        }, 'json');
    }
    </script>
<?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>
