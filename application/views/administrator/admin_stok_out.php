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
            <h1 class="m-0">Stok Keluar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Inventori</a></li>
              <li class="breadcrumb-item active">Stok Keluar</li>
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
                    <a href="<?php echo base_url().'Produk/kurang_stok'?>" class="btn btn-block btn-secondary">Tambah Stok Keluar</a>
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
                    <table id="tbl_stok_out" class="table table-borderless table-striped">
                        <thead>
                        <tr>
                            <th class="text-left">WAKTU SUBMIT</th>
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
          $('#tbl_stok_out').DataTable().ajax.reload();
        });

        var table = $('#tbl_stok_out').DataTable({
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
            'processing': true,
            "responsive": true,
            'serverSide': true,
            "searching": false,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?php echo base_url().'Produk/tbl_stok_out'?>',
                'data': function(data){
                  var bulan = $('#bulan option:selected').val();
                  var tahun = $('#tahun option:selected').val();

                  data.bulan = bulan;
                  data.tahun = tahun;
                }
            },
            'columns': [
                {
                    data: 'stok_out_dt_create'
                },
                {
                    data: 'catatan'
                },
                {
                    data: 'stok_out_dt_masuk'
                },
                {
                    data: 'cek'
                }
            ]
        });

        $('#bulan').on('change', function(){
          $('#tbl_stok_out').DataTable().ajax.reload();
        });

        $('#tahun').on('change', function(){
          $('#tbl_stok_out').DataTable().ajax.reload();
        });
      });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">STOK KELUAR : <p id="stok_out_kd"></p></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table>
                <tr>
                  <td><i class="nav-icon fas fa-calendar-alt"></i></td>
                  <td>:</td>
                  <td><p id="stok_out_dt_masuk" style="margin: 0;"></p></td>
                </tr>
                <tr>
                  <td><i class="nav-icon fas fa-user-edit"></i></td>
                  <td>:</td>
                  <td><p id="stok_out_user_create" style="margin: 0;"></p></td>
                </tr>
              </table>

              <table class="table">
                  <thead>
                    <tr>
                      <th class="text-left">NAMA</th>
                      <th class="text-right">JUMLAH</th>
                      <th class="text-center">SATUAN</th>
                    </tr>
                  </thead>
                  <tbody id="detail_stok_out">
                  </tbody>
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
        $('#modal-default').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget)
          var recipient = button.data('whatever')
          var modal = $(this);
          var dataString = 'id=' + recipient
          $.get('<?php echo base_url('Produk/get_detail_stok_keluar')?>', dataString, function(data){
              $('#stok_out_dt_masuk').html(data.keterangan[0].stok_out_dt_masuk);
              $('#stok_out_user_create').html(data.keterangan[0].stok_out_user_create);

              var html = '';
              var i;
              for(i=0; i < data.detail_produk.length; i++){
                  html += `
                      <tr>
                          <td style="text-align: center;">${data.detail_produk[i].produk_nama}</td>
                          <td style="text-align: right;">${data.detail_produk[i].stok_out_detail_jumlah}</td>
                          <td style="text-align: center;">${data.detail_produk[i].produk_satuan}</td>
                      </tr>
                  `;
              }

              $('#detail_stok_out').html(html);
          }, 'json');
        });
      </script>
    <?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>