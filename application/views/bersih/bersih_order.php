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
                    <a class="btn btn-block btn-secondary" href="intent:base64,G0AbYQEbISBSdW1haCBNYWthbiBLaXRhChshAEphbGFuIEtlbmFuZ2EgMTQKChthAS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tChthAFdha3R1IDobYQIgV2VkIDMwIEp1biAyMDIxIDA4OjA5ChthAE5vLiBTdHJ1ayA6G2ECIFMyMTA2MzAzChthAFBlbWJheWFyYW4gOhthAiBUdW5haQobYQEtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQobYQEbRQFQRVNBTkFOChtFAAobYQBOYXNpIE9zZW5nIEF5YW0gQmFsYWRvCiBScCAxMC4wMDAgeCA0ID0gUnAgNDAuMDAwCk5hc2kgT3NlbmcgQXlhbSBCYWxhZG8KIFJwIDEwLjAwMCB4IDQgPSBScCA0MC4wMDAKTmFzaSBPc2VuZyBBeWFtIEJhbGFkbwogUnAgMTAuMDAwIHggNCA9IFJwIDQwLjAwMApOYXNpIE9zZW5nIEF5YW0gQmFsYWRvCiBScCAxMC4wMDAgeCA0ID0gUnAgNDAuMDAwChthAgobRQFUb3RhbCBScCAxNjAuMDAwG0UACgobYQBCYXlhciAgIFJwIDIwMC4wMDAKS2VtYmFsaSBScCA0MC4wMDAKG2QCG2EBVGVyaW1hIEthc2loIEF0YXMgS3VuanVuZ2FuIEFuZGEKQ3VhbiBTZWhhdCBTZWxhbHUbZAIbcDA8eA==#Intent;scheme=rawbt;package=ru.a402d.rawbtprinter;end;">Print Order</a>
                </div> -->
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
                                <!-- /.input group -->
                            </div>
                        </div>
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
                    <table id="tbl_stok_in" class="table table-borderless table-striped">
                        <thead>
                        <tr>
                            <th class="text-left">WAKTU PESANAN</th>
                            <th class="text-left">ID PESANAN MASUK MASUK</th>
                            <th class="text-left">NO MEJA/ NAMA PEMESAN</th>
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
              'url': '<?php echo base_url().'Bersih/tbl_order'?>',
              'data': function(data){
                var cari_produk = $('#cari_produk').val();
                var tanggal = $('#tanggal option:selected').val();
                var bulan = $('#bulan option:selected').val();
                var tahun = $('#tahun option:selected').val();

                data.searchCari = cari_produk;
                data.tanggal = tanggal;
                data.bulan = bulan;
                data.tahun = tahun;
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

      $('#tanggal').on('click', function(){
        $('#tbl_stok_in').DataTable().ajax.reload();
      });

      $('#bulan').on('click', function(){
        $('#tbl_stok_in').DataTable().ajax.reload();
      });

      $('#tahun').on('click', function(){
        $('#tbl_stok_in').DataTable().ajax.reload();
      })

    });
    </script>

    <!-- Modal -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ORDER MASUK : </h4>
              <button type="button" onclick="tutup_modal()" class="close" data-dismiss="modal" aria-label="Close">
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
              <input type="hidden" id="order_id" name="order_id">
              <table>
                <tr>
                  <td><button class="btn btn-success" type="button" id="order_selesai" name="order_selesai" style="display: none;">ORDER SELESAI</button></td>
                  <!-- <td><button class="btn btn-block btn-danger" type="button" id="order_cancel" name="order_cancel">CANCEL ORDER</button></td> -->
                </tr>
              </table>
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

        function tutup_modal(){
          $('#order_selesai').hide();
          $('#modal-default').modal('hide');
        }

        $('#modal-default').on('show.bs.modal', function(event) {
					var button = $(event.relatedTarget)
					var recipient = button.data('whatever')
					var modal = $(this);
					var dataString = 'id=' + recipient;
          
          $.get("<?php echo base_url().'Bersih/get_order_masuk_data'?>", dataString, function(data){
            $('#order_dt_masuk').html(data.order[0].order_dt_create);
            $('#order_user_create').html(data.order[0].order_user_create);
            $('#order_id').val(recipient);
            var cek_selesai = data.order[0].order_selesai;
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
            if(cek_selesai == 0){
              $('#order_selesai').show();
            }
          }, 'json');
				});

        $('#order_selesai').on('click', function(){
          var id = $('#order_id').val();
          var dataString = 'id='+id;

          $.post("<?php echo base_url().'Bersih/order_selesai'?>", dataString, function(){
            print_struk(id);
            tutup_modal();
            $('#tbl_stok_in').DataTable().ajax.reload();
          });
        });

        function print_struk(kode){
          var dataString = "kode="+kode;
          $.get("<?php echo base_url('Bersih/cetak_struk_db')?>", dataString, function(data){
            window.location.href = data;
          });
        }
      </script>
  <?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>
