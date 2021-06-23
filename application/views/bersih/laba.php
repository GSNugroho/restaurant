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
                    <!-- <div class="card-body table-responsive p-0">
                    <h2>Modal</h2>
                      <table class="table table-hover text-nowrap">
                        <tr>
                          <td>Modal Awal</td>
                          <td>:</td>
                          <td><span>30.000.000</span><input type="hidden" id="modal" name="modal" value="30000000"></td>
                        </tr>
                        <tr>
                          <td>Pembelian Bahan Baku Awal</td>
                          <td>:</td>
                          <td><span id="pembelian_bb"></span></td>
                        </tr>
                        <tr>
                          <td>Sisa Modal</td>
                          <td>:</td>
                          <td><span id="sisa_modal"></span></td>
                        </tr>
                      </table>
                    </div>
                    <br>
                    <div class="card-body table-responsive p-0">
                    <h2>Penjualan</h2>
                        <table class="table table-hover text-nowrap">
                            <tr>
                                <td>Uang Masuk</td>
                                <td>:</td>
                                <td><span id="uang_masuk"></span></td>
                            </tr>
                            <tr>
                                <td>HPP Semua Yang Terjual</td>
                                <td>:</td>
                                <td><span id="uang_hpp"></span></td>
                            </tr> -->
                            <!-- <tr>
                              <td>Pengeluaran Peralatan</td>
                              <td>:</td>
                              <td><span id="pengeluaran"></span></td>
                            </tr> -->
                            <!-- <tr>
                                <td>Total Laba</td>
                                <td>:</td>
                                <td><span id="uang_laba"></span></td>
                            </tr>
                            <tr>
                              <td>Sisa Aset Bahan Baku</td>
                              <td>:</td>
                              <td><span id="sisa_aset"></span></td>
                            </tr>
                        </table>
                    </div> -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th style="text-align: center;">Tanggal</th>
                            <th style="text-align: right;">Kas Awal</th>
                            <th style="text-align: right;">Kas Masuk</th>
                            <th style="text-align: right;">Kas Keluar</th>
                            <th style="text-align: right;">Saldo</th>
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
            var kas_awal = 10000000;
            var modal_awal = 10000000;
            var stok_awal = 0;

            var modal = $('#modal').val();
            // var pengeluaran = 0;
            var laba = 0;

            for(var x=0; x < data.tanggal.length; x++){
              htmla += `<tr><td style="text-align: center;">${data.tanggal[x].stok_in_dt_masuk}</td><td style="text-align: right;">${uang(kas_awal)}</td>`;
              var beli_stok = 0;
              var harga_jual = 0;
              var jual_stok = 0;
              

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

              // kas masuk
              htmla += `<td style="text-align: right;">${uang(harga_jual)}</td>`;

              // kas keluar
              htmla += `<td style="text-align: right;">${uang(beli_stok)}</td>`;

              // saldo
              htmla += `<td style="text-align: right;">${uang(modal_awal - beli_stok + harga_jual)}</td>`;

              // stok masuk
              htmla += `<td style="text-align: right;">${uang(beli_stok)}</td>`;

              // stok keluar
              htmla += `<td style="text-align: right;">${uang(parseInt(jual_stok))}</td>`;
              
              // sisa stok
              htmla += `<td style="text-align: right;">${uang(parseInt(stok_awal + beli_stok - jual_stok))}</td>`;

              // semua aset
              htmla += `<td style="text-align: right;">${uang((modal_awal - beli_stok + harga_jual) + (parseInt(stok_awal + beli_stok - jual_stok)))}</td>`;

              // laba
              htmla += `<td style="text-align: right;">${uang(harga_jual - parseInt(jual_stok))}</td>`;

              modal_awal = modal_awal - beli_stok + harga_jual;
              stok_awal = stok_awal + beli_stok - parseInt(jual_stok);
              kas_awal = 0;
            }
            htmla += `</tr>`;

            // for(var i=0; i < data.pembelian_bb.length; i++){
            //   pembelian_bb += parseInt(data.pembelian_bb[i].jumlah) * parseInt(data.pembelian_bb[i].harga);
            // }

            // for(var i=0; i < data.uang_masuk.length; i++){
            //     uang_masuk += parseInt(data.uang_masuk[i].jumlah) * parseInt(data.uang_masuk[i].harga);
            // }

            // for(var i=0; i < data.uang_hpp.length; i++){
            //     uang_hpp += parseFloat(data.uang_hpp[i].jumlah) * parseInt(data.uang_hpp[i].harga);
            // }

            // for(var i=0; i < data.pengeluaran.length; i++){
            //     pengeluaran += parseInt(data.pengeluaran[i].jumlah) * parseInt(data.pengeluaran[i].harga);
            // }

            // laba = uang_masuk - parseInt(uang_hpp);

            // sisa_modal = parseInt(modal) - parseInt(pembelian_bb);

            // sisa_aset = parseInt(pembelian_bb) - parseInt(uang_hpp);

            // $('#uang_masuk').html(uang(uang_masuk));
            // $('#uang_hpp').html(uang(parseInt(uang_hpp)));
            // $('#pembelian_bb').html(uang(parseInt(pembelian_bb)));
            // $('#sisa_modal').html(uang(parseInt(sisa_modal)));
            // // $('#pengeluaran').html(uang(pengeluaran));
            // $('#uang_laba').html(uang(laba));
            // $('#sisa_aset').html(uang(sisa_aset));
            $('#isi-table-laba').html(htmla);
        }, 'json');
    }
    </script>
<?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>
