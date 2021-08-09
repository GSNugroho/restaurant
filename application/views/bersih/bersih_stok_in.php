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
            <h1 class="m-0">Stok Masuk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Inventori</a></li>
              <li class="breadcrumb-item active">Stok Masuk</li>
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
                    <a class="btn btn-block btn-secondary" href="<?php echo base_url().'Bersih/tambah_stok'?>">Tambah Stok Masuk</a>
                    <!-- <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-default">
                  .......
                </button> -->
                </div>
            </div>
            <br>
            <div class="card card-secondary card-tabs">
              <div class="card-body">
                <div class="row">
                  
                  <div class="col-2">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <select class="form-control" name="tanggal" id="tanggal">
                          <option value=""></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-group">
                          <label>Bulan</label>
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
                        </div>
                    </div>
                    <div class="col-2">
                      <label>Tahun</label>
                      <select class="form-control" name="tahun" id="tahun">
                      </select>
                    </div>
                </div>
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
                    <!-- <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="kategori_produk">Kategori</label>
                                <select class="form-control" id="kategori_produk" name="kategori_produk">
                                    <option>Semua Kategori</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Cari</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="cari_produk" name="cari_produk">
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <table id="tbl_stok_in" class="table table-borderless table-striped">
                        <thead>
                        <tr>
                            <th class="text-left">WAKTU SUBMIT</th>
                            <th class="text-left" style="display: none;">ID STOK MASUK</th>
                            <th class="text-left">CATATAN</th>
                            <th class="text-left">TANGGAL</th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>
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
      Pusher.logToConsole = true;

      var pusher = new Pusher('fbc78684682a51811d95', {
        cluster: 'ap1'
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        $('#tbl_stok_in').DataTable().ajax.reload();
      });
      
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
              [0, "desc"]
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
              'data': function(data){
                var tanggal = $('#tanggal option:selected').val();
                var bulan = $('#bulan option:selected').val();
                var tahun = $('#tahun option:selected').val();

                data.tanggal = tanggal;
                data.bulan = bulan;
                data.tahun = tahun;
              }
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

      $('#tanggal').on('change', function(){
        $('#tbl_stok_in').DataTable().ajax.reload();
      });

      $('#bulan').on('change', function(){
        $('#tbl_stok_in').DataTable().ajax.reload();
      });

      $('#tahun').on('change', function(){
        $('#tbl_stok_in').DataTable().ajax.reload();
      })
    });
    </script>

    <!-- Modal -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">STOK MASUK : <p id="stok_in_kd"></p></h4>
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
  <?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>
