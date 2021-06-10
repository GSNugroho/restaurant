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
            <h1 class="m-0">Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
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
                <!-- <div class="col-2">
                     <button class="btn btn-block btn-outline-secondary">Impor Stok Masuk</button> 
                </div> -->
                <div class="col-2">
                    <!-- <a class="btn btn-block btn-secondary" href="<?php echo base_url().'Bersih/tambah_order'?>">Tambah Order</a> -->
                    <!-- <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modal-default">
                  .......
                </button> -->
                </div>
            </div>
            <br>
            <div class="card card-secondary card-tabs">
              <div class="card-body">
                    <div class="row">
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
                    </div>
                    <table id="tbl_stok_in" class="table table-borderless table-striped ">
                        <thead>
                        <tr>
                            <th class="text-left">WAKTU PESANAN</th>
                            <th class="text-left">ID PESANAN MASUK MASUK</th>
                            <th class="text-left">NAMA PEMESAN</th>
                            <th></th>
                            <th style="display: none;"></th>
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
      var table = $('#tbl_stok_in').DataTable({
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
          'processing': true,
          "responsive": true,
          'serverSide': true,
          "searching": false,
          'serverMethod': 'post',
          "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                if (aData['order_selesai'] == 1) {
                    $('td', nRow).css('background-color', 'Lightgreen');
                } else {
                    $('td', nRow).css('background-color', 'LightCoral');
                }
            },
          "columnDefs": [
            {
              "targets": [4],
              "visible": false
            }
          ],
          'ajax': {
              'url': '<?php echo base_url().'Kasir/tbl_order'?>',
              'data': function(data){
                var cari_produk = $('#cari_produk').val();

                data.searchCari = cari_produk;
              }
          },
          'columns': [
              {
                  data: 'order_dt_create'
              },
              {
                  data: 'order_id'
              },
              {
                  data: 'order_nm_pemesan'
              },
              {
                  data: 'cek'
              },
              {
                  data: 'order_selesai'
              }
          ]
      });

      $('#cari_produk').on('keyup', function(){
        $('#tbl_stok_in').DataTable().ajax.reload();
      });
    });
    </script>

    <!-- Modal -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ORDER MASUK : </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table>
                <tr>
                  <td><i class="nav-icon fas fa-calendar-alt"></i></td>
                  <td>:</td>
                  <td><span id="order_dt_masuk"></span></td>
                </tr>
                <tr>
                  <td><i class="nav-icon fas fa-user-edit"></i></td>
                  <td>:</td>
                  <td><span id="order_user_create"></span></td>
                </tr>
              </table>

              <table class="table">
                  <thead>
                    <tr style="background-color: #6c757d;">
                      <th class="text-left">NAMA PESANAN</th>
                      <th class="text-right">JUMLAH</th>
                      <th class="text-left">SATUAN</th>
                      <th class="text-right">HARGA</th>
                      <th class="text-right">SUB TOTAL</th>
                    </tr>
                  </thead>
                  <tbody id="isi_tbl_detail_order">
                  </tbody>
                  <tfoot>
                    <tr style="background-color: #6c757d;">
                      <th colspan="4" class="text-right">TOTAL</th>
                      <th class="text-right"><span id="total_sub"></span></th>
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
          
          $.get("<?php echo base_url().'Kasir/get_order_masuk_data'?>", dataString, function(data){
            $('#order_dt_masuk').html(data.order[0].order_dt_create);
            $('#order_user_create').html(data.order[0].order_user_create);

            var html = '';
            var i;
            var total_sub = 0;
            for(i=0; i < data.detail_order.length; i++){
                html += `
                    <tr>
                        <td style="text-align: left;">${data.detail_order[i].produk_nama}</td>
                        <td style="text-align: right;">${data.detail_order[i].order_detail_jumlah}</td>
                        <td style="text-align: left;">${data.detail_order[i].produk_satuan}</td>
                        <td style="text-align: right;">${uang(data.detail_order[i].produk_harga)}</td>
                        <td style="text-align: right;">${uang(data.detail_order[i].sub_total)}</td>
                    </tr>
                `;

                total_sub += parseInt(data.detail_order[i].sub_total);
            }

            $('#isi_tbl_detail_order').html(html);
            $('#total_sub').html(uang(total_sub));
          }, 'json');
		});
      </script>
  <?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>
