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
            <h1 class="m-0">Laba Harian</h1>
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
                    <table>
                      <form method="POST" action="<?php echo base_url('Bersih/printdatalabaharian')?>" target="_blank">
                      <tr>
                        <th style="text-align: center;">Bulan</th>
                        <th></th>
                        <th style="text-align: center;">Tahun</th>
                        <th></th>
                        <th></th>
                      </tr>
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
                          <button class="btn btn-danger" type="submit" id="download_laba" name="download_laba">Download Laba Harian</button>
                        </td>
                        </form>
                        <td>
                            <button class="btn btn-success" type="submit" id="lihat_laba">Lihat Laba Harian</button>
                        </td>
                      </tr>
                    </table>
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


                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th style="text-align: center;">Tanggal</th>
                            <th style="text-align: right;">Kas Awal</th>
                            <th style="text-align: right;">Kas Masuk</th>
                            <th style="text-align: right;">Kas Keluar</th>
                            <th style="text-align: right;">Saldo</th>
                            <th style="text-align: right">Stok Awal</th>
                            <th style="text-align: right;">Stok Masuk</th>
                            <th style="text-align: right;">Stok Keluar</th>
                            <th style="text-align: right;">Sisa Stok</th>
                            <th style="text-align: right;">Semua Aset</th>
                            <th style="text-align: right;">Laba</th>
                          </tr>
                          <tr>
                          </tr>
                        </thead>
                        <tbody id="isi-table-laba">
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
        get_data_laba();
    });

    function uang(uang){
            var reverse = uang.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            
            if(uang < 0){
              return '('+ribuan+')';
            }else{
              return ribuan
            }
            
        }

    function get_data_laba(){
        $.get("<?php echo base_url().'Bersih/get_all_laba'?>", function(data){
            var htmla = '';
            var uang_masuk = 0;
            var uang_hpp = 0;
            var pembelian_bb = 0;
            var sisa_aset = 0;
            var kas_awal = data.modal[0].saldo;
            var modal_awal = data.modal[0].saldo;
            var stok_awal = 0;

            var modal = $('#modal').val();
            // var pengeluaran = 0;
            var laba = 0;

            for(var x=0; x < data.tanggal.length; x++){
              htmla += `<tr><td style="text-align: center;">${data.tanggal[x].stok_in_dt_masuk}</td><td style="text-align: right;">${uang(kas_awal)}</td>`;
              var beli_stok = 0;
              var harga_jual = 0;
              var jual_stok = 0;
              var masuk_sblm = 0;
              var jual_sblm = 0;
              

              for(var y=0; y < data.stok_masuk.length; y++){
                if(data.stok_masuk[y].stok_in_dt_masuk == data.tanggal[x].stok_in_dt_masuk){
                  beli_stok += data.stok_masuk[y].jumlah_stok * data.stok_masuk[y].harga;
                }
              }
             

              for(var w=0; w < data.uang_masuk.length; w++){
                if(data.uang_masuk[w].tgl_order == data.tanggal[x].stok_in_dt_masuk){
                  harga_jual += data.uang_masuk[w].jumlah * data.uang_masuk[w].harga;
                }
              }
              

              for(var z=0; z < data.stok_jual.length; z++){
                if(data.stok_jual[z].stok_out_dt_masuk == data.tanggal[x].stok_in_dt_masuk){
                  jual_stok += data.stok_jual[z].jumlah_stok * data.stok_jual[z].harga;
                }
              }

              for(var g=0; g < data.stok_jual_nc.length; g++){
                if(data.stok_jual_nc[g].stok_out_dt_masuk == data.tanggal[x].stok_in_dt_masuk){
                  jual_stok += data.stok_jual_nc[g].jumlah_stok * data.stok_jual_nc[g].harga;
                }
              }

              for(var a=0; a < data.stok_masuk_bb.length; a++){
                if(data.stok_masuk_bb[a].stok_in_dt_masuk < data.tanggal[x].stok_in_dt_masuk){
                  masuk_sblm += data.stok_masuk_bb[a].jumlah_stok * data.stok_masuk_bb[a].harga;
                }
              }

              for(var b=0; b < data.stok_jual_bb.length; b++){
                if(data.stok_jual_bb[b].stok_out_dt_masuk < data.tanggal[x].stok_in_dt_masuk){
                  jual_sblm += data.stok_jual_bb[b].jumlah_stok * data.stok_jual_bb[b].harga;
                }
              }

              for(var c=0; c < data.stok_jual_nc_bb.length; c++){
                if(data.stok_jual_nc_bb[c].stok_out_dt_masuk < data.tanggal[x].stok_in_dt_masuk){
                  jual_sblm += data.stok_jual_nc_bb[c].jumlah_stok * data.stok_jual_nc_bb[c].harga;
                }
              }

              // kas masuk
              htmla += `<td style="text-align: right;">${uang(harga_jual)}</td>`;

              // kas keluar
              htmla += `<td style="text-align: right;">${uang(parseInt(beli_stok))}</td>`;

              // saldo
              htmla += `<td style="text-align: right;">${uang(modal_awal - parseInt(beli_stok) + harga_jual)}</td>`;

              // stok awal
              htmla += `<td style="text-align: right;">${uang(parseInt(masuk_sblm - jual_sblm))}</td>`;

              // stok masuk
              htmla += `<td style="text-align: right;">${uang(parseInt(beli_stok))}</td>`;

              // stok keluar
              htmla += `<td style="text-align: right;">${uang(parseInt(jual_stok))}</td>`;
              
              // sisa stok
              htmla += `<td style="text-align: right;">${uang(parseInt(stok_awal + beli_stok - jual_stok))}</td>`;

              // semua aset
              htmla += `<td style="text-align: right;">${uang((modal_awal - parseInt(beli_stok) + harga_jual) + (parseInt(stok_awal + beli_stok - jual_stok)))}</td>`;

              // laba
              htmla += `<td style="text-align: right;">${uang(harga_jual - parseInt(jual_stok))}</td>`;

              modal_awal = modal_awal - parseInt(beli_stok) + harga_jual;
              stok_awal = stok_awal + parseInt(beli_stok) - parseInt(jual_stok);
              kas_awal = 0;
            }
            htmla += `</tr>`;
            $('#isi-table-laba').html(htmla);
        }, 'json');
    }

    $('#lihat_laba').on('click', function(){
      var bulan = $('#bulan').val();
      var tahun = $('#tahun').val();

      var dataString = 'bulan='+bulan+'&tahun='+tahun;

      $.get("<?php echo base_url().'Bersih/pilih_get_all_laba'?>", dataString, function(data){
            var htmla = '';
            var uang_masuk = 0;
            var uang_hpp = 0;
            var pembelian_bb = 0;
            var sisa_aset = 0;
            var kas_awal = data.modal[0].saldo;
            var modal_awal = data.modal[0].saldo;
            var stok_awal = 0;

            var modal = $('#modal').val();
            // var pengeluaran = 0;
            var laba = 0;

            for(var x=0; x < data.tanggal.length; x++){
              htmla += `<tr><td style="text-align: center;">${data.tanggal[x].stok_in_dt_masuk}</td><td style="text-align: right;">${uang(kas_awal)}</td>`;
              var beli_stok = 0;
              var harga_jual = 0;
              var jual_stok = 0;
              var masuk_sblm = 0;
              var jual_sblm = 0;
              

              for(var y=0; y < data.stok_masuk.length; y++){
                if(data.stok_masuk[y].stok_in_dt_masuk == data.tanggal[x].stok_in_dt_masuk){
                  beli_stok += data.stok_masuk[y].jumlah_stok * data.stok_masuk[y].harga;
                }
              }
             
              for(var w=0; w < data.uang_masuk.length; w++){
                if(data.uang_masuk[w].tgl_order == data.tanggal[x].stok_in_dt_masuk){
                  harga_jual += data.uang_masuk[w].jumlah * data.uang_masuk[w].harga;
                }
              }
              
              for(var z=0; z < data.stok_jual.length; z++){
                if(data.stok_jual[z].stok_out_dt_masuk == data.tanggal[x].stok_in_dt_masuk){
                  jual_stok += data.stok_jual[z].jumlah_stok * data.stok_jual[z].harga;
                }
              }

              for(var g=0; g < data.stok_jual_nc.length; g++){
                if(data.stok_jual_nc[g].stok_out_dt_masuk == data.tanggal[x].stok_in_dt_masuk){
                  jual_stok += data.stok_jual_nc[g].jumlah_stok * data.stok_jual_nc[g].harga;
                }
              }

              for(var a=0; a < data.stok_masuk_bb.length; a++){
                if(data.stok_masuk_bb[a].stok_in_dt_masuk == data.tanggal[x].stok_in_dt_masuk){
                  masuk_sblm += data.stok_masuk_bb[a].jumlah_stok * data.stok_masuk_bb[a].harga;
                }
              }

              for(var b=0; b < data.stok_jual_bb.length; b++){
                if(data.stok_jual_bb[b].stok_out_dt_masuk == data.tanggal[x].stok_in_dt_masuk){
                  jual_sblm += data.stok_jual_bb[b].jumlah_stok * data.stok_jual_bb[b].harga;
                }
              }

              for(var c=0; c < data.stok_jual_nc_bb.length; c++){
                if(data.stok_jual_nc_bb[c].stok_out_dt_masuk == data.taggal[x].stok_in_dt_masuk){
                  jual_sblm += data.stok_jual_nc_bb[c].jumlah_stok * data.stok_jual_nc_bb[c].harga;
                }
              }

              // kas masuk
              htmla += `<td style="text-align: right;">${uang(harga_jual)}</td>`;

              // kas keluar
              htmla += `<td style="text-align: right;">${uang(parseInt(beli_stok))}</td>`;

              // saldo
              htmla += `<td style="text-align: right;">${uang(modal_awal - parseInt(beli_stok) + harga_jual)}</td>`;
              
              // stok awal
              htmla += `<td style="text-align: right;">${uang(masuk_sblm - jual_sblm)}</td>`;

              // stok masuk
              htmla += `<td style="text-align: right;">${uang(parseInt(beli_stok))}</td>`;

              // stok keluar
              htmla += `<td style="text-align: right;">${uang(parseInt(jual_stok))}</td>`;
              
              // sisa stok
              htmla += `<td style="text-align: right;">${uang(parseInt(stok_awal + beli_stok - jual_stok))}</td>`;

              // semua aset
              htmla += `<td style="text-align: right;">${uang((modal_awal - parseInt(beli_stok) + harga_jual) + (parseInt(stok_awal + beli_stok - jual_stok)))}</td>`;

              // laba
              htmla += `<td style="text-align: right;">${uang(harga_jual - parseInt(jual_stok))}</td>`;

              modal_awal = modal_awal - parseInt(beli_stok) + harga_jual;
              stok_awal = stok_awal + parseInt(beli_stok) - parseInt(jual_stok);
              kas_awal = 0;
            }
            htmla += `</tr>`;

            $('#isi-table-laba').html(htmla);
        }, 'json');
    })
    </script>
<?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>
