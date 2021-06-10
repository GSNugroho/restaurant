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
                    <a href="<?php echo base_url().'Bersih/kurang_stok'?>" class="btn btn-block btn-secondary">Tambah Stok Keluar</a>
                    <!-- <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-default">
                  .......
                </button> -->
                </div>
            </div>
            <br>
            <div class="card card-secondary card-tabs">
              <div class="card-body">
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
                    <table id="tbl_stok_out" class="table table-borderless table-striped">
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
        var table = $('#tbl_stok_out').DataTable({
            language: {
              "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
              "sProcessing": "Sedang memproses...",
              "sLengthMenu": "Tampilkan Data _MENU_",
              "sZeroRecords": "Tidak ditemukan data yang sesuai",
              "sInfo": "Total _TOTAL_ entri",
              "sInfoEmpty": "Total 0 entri",
              "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
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
                'url': '<?php echo base_url().'Bersih/tbl_stok_out'?>',
            },
            'columns': [
                {
                    data: 'stok_out_dt_create'
                },
                {
                    data: 'stok_out_id'
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
          $.get('<?php echo base_url('Bersih/get_detail_stok_keluar')?>', dataString, function(data){
              $('#stok_out_dt_masuk').html(data.keterangan[0].stok_out_dt_masuk);
              $('#stok_out_user_create').html(data.keterangan[0].stok_out_user_create);

              var html = '';
              var i;
              var j;

              for(j=0; j < data.produk.length; j++){
                var jumlah = 0;
                var nama = '';
                var satuan = '';
                for(i=0; i < data.detail_produk.length; i++){
                  if(data.produk[j].produk_id == data.detail_produk[i].produk_id){
                    jumlah += parseFloat(data.detail_produk[i].stok_out_detail_jumlah);
                    nama = data.detail_produk[i].produk_nama;
                    satuan = data.detail_produk[i].produk_satuan;
                  }
                }
                if(nama != ''){
                  html += `
                        <tr>
                            <td style="text-align: center;">${nama}</td>
                            <td style="text-align: right;">${jumlah.toFixed(2)}</td>
                            <td style="text-align: center;">${satuan}</td>
                        </tr>
                    `;
                }
                
              }

              $('#detail_stok_out').html(html);
          }, 'json');
        });
      </script>
    <?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>