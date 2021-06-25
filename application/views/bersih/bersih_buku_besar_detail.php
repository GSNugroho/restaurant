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
            <h1 class="m-0">Buku Besar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Buku Besar</li>
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
                </div>
            </div>
            <br>
            <div class="card card-secondary card-tabs">
              <div class="card-header p-0 pt-1">
                  <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <?php
                        $i = 0;
                        foreach($pos as $row):
                        $i++;
                    ?>
                      <li class="nav-item">
                          <a class="nav-link" id="biaya<?= $i?>" data-toggle="pill" href="#custom-biaya-<?= $i?>" role="tab" aria-controls="custom-biaya-<?= $i?>" aria-selected="false"><?= $row['nm_pos']?></a>
                      </li>
                    <?php endforeach?>
                  </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                        <?php 
                            $a = 0;
                            $debit = 0;
                            $kredit = 0;
                            foreach($pos as $row):
                                $a++;
                                $s=0;
                        ?>
                        <div class="tab-pane" id="custom-biaya-<?= $a?>" role="tabpanel" aria-labelledby="custom-biaya-<?= $a?>">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $totalsaldo = 0;

                                        foreach($biaya as $data){
                                            if($row['kd_pos'] == $data['kd_pos']){
                                                ?>
                                                <tr>
                                                  <td><?= $data['tgl_input']?></td>
                                                  <td><?= $data['keterangan']?></td>
                                                  <td><?= 'Rp '.number_format($data['saldo'], 0, ',', '.')?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php endforeach?>
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
  <?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>
