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
            <h1 class="m-0">Keuangan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengeluaran</li>
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
                    <a class="btn btn-block btn-secondary" href="<?php echo base_url().'Kasir/tambah_pengeluaran'?>">Tambah Data</a>
                    <!-- <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-default">
                  .......
                </button> -->
                </div>
            </div>
            <br>
            <div class="card card-secondary card-tabs">
              <div class="card-header p-0 pt-1">
                  <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="transaksi" data-toggle="pill" href="#custom-transaksi" role="tab" aria-controls="custom-transaksi" aria-selected="false">Transaksi</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="biaya" data-toggle="pill" href="#custom-biaya" role="tab" aria-controls="custom-biaya" aria-selected="false">Buku Besar</a>
                      </li>
                  </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-transaksi" role="tabpanel" aria-labelledby="custom-transaksi">
                    <center center><h4>Transaksi</h4></center>
                    <div>
                      <table>
                        <tr>
                          <td>
                            <div class="form-group">
                              <label>Jenis Saldo</label>
                              <select class="form-control" name="jns_saldo" id="jns_saldo">
                                <option value="">--- ---</option>
                                <option value="1">Uang Keluar</option>
                                <option value="2">Uang Masuk</option>
                              </select>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="card-body table-responsive p-0">
                      <table id="tbl_transaksi" class="table table-borderless table-striped" style="width:100%;">
                        <thead>
                          <tr>
                            <th class="text-center" style="display: none;">kd_transaksi</th>
                            <th class="text-left">Tanggal</th>
                            <th class="text-left">Pos</th>
                            <th class="text-left">Keterangan</th>
                            <th class="text-left">Jenis</th>
                            <th class="text-right">Saldo</th>
                            <th></th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="custom-biaya" role="tabpanel" aria-labelledby="custom-biaya">
                    <div class="card-body table-responsive p-0">
                      <center><h4>Buku Besar</h4></center>
                      <form action="<?php echo base_url('Transaksi/buku_besar_biaya')?>" method="post">
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
                                            <button class="btn btn-success" type="submit" id="button_hitung_laba">Lihat Biaya</button>
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
      var table = $('#tbl_stok_in').DataTable({
          language: {
              "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
              "sProcessing": "Sedang memproses...",
              "sLengthMenu": "Tampilkan Data _MENU_",
              "sZeroRecords": "Tidak ditemukan data yang sesuai",
              "sInfo": "Total _TOTAL_ entri",
              "sInfoEmpty": "Total 0 entri",
              "sInfoFiltered": "",
              "sInfoPostFix": "",
              "sSearch": "Cari:",
              "sUrl": "",
              "oPaginate": {
                  "sFirst": "Pertama",
                  "sPrevious": "Sebelumnya",
                  "sNext": "Selanjutnya",
                  "sLast": "Terakhir"
              }
          },
          'order': [
              [1, "desc"]
          ],
          "columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false
            }
          ],
          'processing': true,
          "responsive": true,
          'serverSide': true,
          "searching": false,
          'serverMethod': 'post',
          'ajax': {
              'url': '<?php echo base_url().'Bersih/tbl_stok_in'?>',
          },
          'columns': [
              {
                  data: 'stok_in_dt_create'
              },
              {
                  data: 'stok_in_id'
              },
              {
                  data: 'catatan'
              },
              {
                  data: 'stok_in_dt_masuk'
              },
              {
                  data: 'cek'
              }
          ]
      });

      var table2 = $('#tbl_transaksi').DataTable({
          language: {
              "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
              "sProcessing": "Sedang memproses...",
              "sLengthMenu": "Tampilkan Data _MENU_",
              "sZeroRecords": "Tidak ditemukan data yang sesuai",
              "sInfo": "Total _TOTAL_ entri",
              "sInfoEmpty": "Total 0 entri",
              "sInfoFiltered": "",
              "sInfoPostFix": "",
              "sSearch": "Cari:",
              "sUrl": "",
              "oPaginate": {
                  "sFirst": "Pertama",
                  "sPrevious": "Sebelumnya",
                  "sNext": "Selanjutnya",
                  "sLast": "Terakhir"
              }
          },
          'order': [
              [1, "asc"]
          ],
          "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }
          ],
          'processing': true,
          "responsive": true,
          'serverSide': true,
          "searching": false,
          'serverMethod': 'post',
          'ajax': {
              'url': '<?php echo base_url().'Transaksi/tbl_transaksi'?>',
              'data': function(data){
                var jns_saldo = $('#jns_saldo option:selected').val();

                data.jns_saldo = jns_saldo;
              }
          },
          'columns': [
              {
                  data: 'kd_transaksi'
              },
              {
                  data: 'tgl_input'
              },
              {
                  data: 'nm_pos'
              },
              {
                  data: 'keterangan'
              },
              {
                  data: 'jns_saldo'
              },
              {
                  data: 'saldo', className: 'text-right'
              },
              {
                  data: 'cek'
              }
          ]
      });

      $('#jns_saldo').on('change', function(){
        $('#tbl_transaksi').DataTable().ajax.reload();
      });
    });
    </script>

    <!-- Modal -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">PENGELUARAN : <p id="stok_in_kd"></p></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table>
                <tr>
                  <td><i class="nav-icon fas fa-calendar-alt"></i></td>
                  <td>:</td>
                  <td><p id="stok_in_dt_masuk" style="margin: 0;"></p></td>
                </tr>
                <tr>
                  <td><i class="nav-icon fas fa-user-edit"></i></td>
                  <td>:</td>
                  <td><p id="stok_in_user_create" style="margin: 0;"></p></td>
                </tr>
              </table>

              <table class="table">
                  <thead>
                    <tr>
                      <th class="text-left">NAMA</th>
                      <th class="text-right">JUMLAH</th>
                      <th class="text-left">SATUAN</th>
                      <th class="text-right">HARGA BELI PER UNIT</th>
                      <th class="text-right">TOTAL HARGA BELI</th>
                    </tr>
                  </thead>
                  <tbody id="detail_stok_in">
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="4" class="text-right">Total</td>
                      <td class="text-right"><span id="total_semua_stok_in"></span></td>
                    </tr>
                  </tfoot>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <script>
        function uang(uang){
            var reverse = uang.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan
        }

        $('#modal-default').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget)
          var recipient = button.data('whatever')
          var modal = $(this);
          var dataString = 'id=' + recipient
          $.get('<?php echo base_url('Bersih/get_detail_stok_masuk_bersih')?>', dataString, function(data){
              $('#stok_in_dt_masuk').html(data.keterangan[0].stok_in_dt_masuk);
              $('#stok_in_user_create').html(data.keterangan[0].stok_in_user_create);

              var total_semua = 0;
              var html = '';
              var i;
              for(i=0; i < data.detail_produk.length; i++){
                  total_semua += parseInt(data.detail_produk[i].stok_in_detail_harga) * parseInt(data.detail_produk[i].stok_in_detail_jumlah);

                  html += `
                      <tr>
                          <td style="text-align: center;">${data.detail_produk[i].produk_nama}</td>
                          <td style="text-align: right;">${data.detail_produk[i].stok_in_detail_jumlah}</td>
                          <td style="text-align: center;">${data.detail_produk[i].produk_satuan}</td>
                          <td style="text-align: right;">${uang(data.detail_produk[i].stok_in_detail_harga)}</td>
                          <td style="text-align: right;">${uang(parseInt(data.detail_produk[i].stok_in_detail_harga) * parseInt(data.detail_produk[i].stok_in_detail_jumlah))}</td>
                      </tr>
                  `;
              }

              $('#detail_stok_in').html(html);
              $('#total_semua_stok_in').html(uang(total_semua));
          }, 'json');
        });
      </script>


      <div class="modal fade" id="modal-transaksi">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TRANSAKSI : </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-responsive table-borderless">
                <tr>
                  <td>Tanggal</td>
                  <td>&nbsp;:&nbsp;</td>
                  <td id="tanggal_input"></td>
                </tr>
                <tr>
                  <td>Pos</td>
                  <td>&nbsp;:&nbsp;</td>
                  <td id="pos_nama"></td>
                </tr>
                <tr>
                  <td>Jenis Saldo</td>
                  <td>&nbsp;:&nbsp;</td>
                  <td id="saldo_jenis"></td>
                </tr>
                <tr>
                  <td>Saldo</td>
                  <td>&nbsp;:&nbsp;</td>
                  <td id="saldo"></td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td>&nbsp;:&nbsp;</td>
                  <td id="keterangan"></td>
                </tr>
              </table>
            </div>
            <div class="modal-footer justify-content-between">
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <script>
        function uang(uang){
            var reverse = uang.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan
        }

        $('#modal-transaksi').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget)
          var recipient = button.data('whatever')
          var modal = $(this);
          var dataString = 'id=' + recipient
          $.get('<?php echo base_url('Transaksi/get_detail_transaksi')?>', dataString, function(data){
              var jns_saldo = '';
              $('#tanggal_input').html(data.detail[0].tgl_input);
              $('#pos_nama').html(data.detail[0].nm_pos);

              if(data.detail[0].jns_saldo == 1){
                jns_saldo = 'Uang Keluar';
              }else{
                jns_saldo = 'Uang Masuk';
              }
              $('#saldo_jenis').html(jns_saldo);
              $('#saldo').html(uang(data.detail[0].saldo));
              $('#keterangan').html(data.detail[0].keterangan);

          }, 'json');
        });
      </script>

      <div class="modal fade" id="modal-transaksi-hapus">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TRANSAKSI HAPUS: </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div>
                Apakah anda yakin untuk menghapus transaksi ini ?
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <input type="hidden" name="transaksi_kd_hapus" id="transaksi_kd_hapus">
              <button class="btn btn-danger" id="submit_hapus_transaksi" name="submit_hapus_transaksi">Hapus</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <script>
        function uang(uang){
            var reverse = uang.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan
        }

        $('#modal-transaksi-hapus').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget)
          var recipient = button.data('whatever')
          var modal = $(this);
          var dataString = 'id=' + recipient

          $('#transaksi_kd_hapus').val(recipient);
        });

        $('#submit_hapus_transaksi').on('click', function(){
          var id = $('#transaksi_kd_hapus').val();

          var dataString = 'id='+id;

          $.post("<?php echo base_url('Transaksi/hapus_transaksi')?>", dataString, function(data){
            $('#modal-transaksi-hapus').modal('hide');
            $('#tbl_transaksi').DataTable().ajax.reload();
          });
        })
      </script>
  <?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>
